<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/public/partials
 */
?>

<div class="wplistifyContents">
    <?php 
    $sections = get_option("wplistify_data");
    if(!is_array($sections)) $sections = [];

    foreach($sections as $section){ 
        $title = isset($section['title']) ? $section['title']: "";
        $fields = isset($section['fields']) ? $section['fields']: [];
        if(!is_array( $fields )) $fields = []; ?>
            <div class="listifySection">
                <h3 class="listItemTitle" style="font-size: <?php echo (get_option('wpl_section_title_fontsize') ? get_option('wpl_section_title_fontsize').'px' :'16px') ?>;"><?php echo stripslashes( $title ) ?></h3>
                <div class="listItems">
                    <?php foreach($fields as $field){ ?>
                        <div class="listItem">
                            <div class="columnLogo">
                                <a href="<?php echo esc_url( $field['buttonLink'] ) ?>" target="_blank" class="wplLogo">
                                    <img style="width: 100px; height: 40px" src="<?php echo esc_url( $field['logoUrl'] ) ?>">
                                </a>
                            </div>
                            <div class="columnScore">
                                <h3 class="fieldTitle"><?php echo ((get_option('wpl_score_title')) ? get_option('wpl_score_title') : 'Site score') ?></h3>
                                <div class="wplStars">
                                    <?php echo $this->get_ratings(intval($field['stars'])) ?>
                                </div>
                            </div>
                            <div class="columnBonus">
                                <h3 class="fieldTitle"><?php echo ((get_option('wpl_bonus_title')) ? get_option('wpl_bonus_title') : 'Site bonus') ?></h3>
                                <p><?php echo stripslashes( $field['bonusTxt'] ) ?></p>
                            </div>
                            <div class="columnButton">
                                <a href="<?php echo esc_url( $field['buttonLink'] ) ?>" target="_blank" class="getBonusBtn"><?php echo ((get_option('wpl_button_text')) ? get_option('wpl_button_text') : 'Get bonus') ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php 
    } ?>
</div>