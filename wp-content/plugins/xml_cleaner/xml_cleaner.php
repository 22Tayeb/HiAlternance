<?php
/*
Plugin Name: XML Annonces Cleaner
Description: Plugin pour nettoyer et insérer des annonces depuis un fichier XML.
Version: 1.0
Author: Tayeb K.
*/

if (!defined('ABSPATH')) exit;

class XML_Annonces_Cleaner {

    public function __construct() {
        add_action('admin_menu', [$this, 'menu_page']);
        add_action('admin_post_upload_xml', [$this, 'handle_upload']);
    }

    public function menu_page() {
        add_menu_page(
            'XML Cleaner',
            'XML Cleaner',
            'manage_options',
            'xml-cleaner',
            [$this, 'admin_page']
        );
    }

    public function admin_page() {
        ?>
        <h1>XML Annonces Cleaner</h1>
        <form method="post" enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>">
            <input type="file" name="xml_file" required>
            <input type="hidden" name="action" value="upload_xml">
            <button type="submit" class="button button-primary">Upload XML</button>
        </form>
        <?php
    }

    public function handle_upload() {
        if (!current_user_can('manage_options')) wp_die('Permission denied');

        if (!isset($_FILES['xml_file']) || $_FILES['xml_file']['error'] !== UPLOAD_ERR_OK) {
            wp_die('Erreur upload fichier XML');
        }

        $xml_file = $_FILES['xml_file']['tmp_name'];
        $xml = simplexml_load_file($xml_file);

        if (!$xml) {
            wp_die('XML invalide');
        }

        foreach ($xml->annonce as $annonce) {
            $guid = (string) $annonce->guid;
            $title = trim((string) $annonce->title);
            $description = trim((string) $annonce->description);

            echo "<p>DEBUG : GUID = $guid, Titre = $title</p>";

            if (empty($title)) {
                echo "<p>Erreur : titre vide</p>";
                continue;
            }

            // Vérifier doublons via guid
            $existing = get_posts([
                'post_type' => 'post',
                'meta_key' => 'guid',
                'meta_value' => $guid,
                'posts_per_page' => 1
            ]);

            if ($existing) {
                echo "<p>Annonce déjà existante : $title</p>";
                continue;
            }

            $post_id = wp_insert_post([
                'post_title' => $title,
                'post_content' => $description,
                'post_status' => 'publish',
                'post_type' => 'post',
                'meta_input' => [
                    'guid' => $guid,
                    'referencenumber' => (string) $annonce->referencenumber,
                    'url' => (string) $annonce->url,
                    'region' => (string) $annonce->region
                ]
            ]);

            if ($post_id) {
                echo "<p>Annonce insérée : $title</p>";
            } else {
                echo "<p>Erreur insertion : $title</p>";
            }
        }

        echo '<p><a href="' . admin_url('edit.php') . '">Retour aux articles</a></p>';
        exit;
    }
}

new XML_Annonces_Cleaner();