<?php

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<div class="wrap">

<h1>

<?=
$domain === null
? esc_html__('Nuevo dominio', 'multidominio-seo')
: esc_html__('Editar dominio', 'multidominio-seo');
?>

</h1>

<form method="post"
      action="<?= esc_url(admin_url('admin-post.php')); ?>">

<input
type="hidden"
name="action"
value="mds_save_domain">

<?php wp_nonce_field('mds_save_domain'); ?>

<input
type="hidden"
name="id"
value="<?= esc_attr($domain?->getId() ?? ''); ?>">

<table class="form-table">

<tr>

<th>Host</th>

<td>

<input
type="text"
name="host"
class="regular-text"
required
value="<?= esc_attr($domain?->getHost() ?? ''); ?>">

</td>

</tr>

<tr>

<th>Título</th>

<td>

<input
type="text"
name="title"
class="regular-text"
required
value="<?= esc_attr($domain?->getTitle() ?? ''); ?>">

</td>

</tr>

<tr>

<th>Idioma</th>

<td>

<input
type="text"
name="language"
value="<?= esc_attr($domain?->getLanguage() ?? 'es'); ?>">

</td>

</tr>

<tr>

<th>Descripción</th>

<td>

<textarea
name="description"
rows="4"
cols="50"><?= esc_textarea($domain?->getDescription() ?? ''); ?></textarea>

</td>

</tr>

<tr>

<th>Principal</th>

<td>

<label>

<input
type="checkbox"
name="primary"
<?= $domain?->isPrimary() ? 'checked' : ''; ?>>

Dominio principal

</label>

</td>

</tr>

<tr>

<th>Activo</th>

<td>

<label>

<input
type="checkbox"
name="enabled"
<?= $domain === null || $domain->isEnabled() ? 'checked' : ''; ?>>

Activo

</label>

</td>

</tr>

</table>

<?php submit_button(__('Guardar dominio', 'multidominio-seo')); ?>

</form>

</div>
