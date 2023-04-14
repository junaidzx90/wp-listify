<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/admin/partials
 */
?>

<h3>Table data</h3>

<div id="wpListifyEditor">
    <div v-if="isLoading" class="loadingWrapper">
        <div class="loadingIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="48px" height="48px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="translate(50 50)">  <g transform="translate(-19 -19) scale(0.6)"> <g>
                <animateTransform attributeName="transform" type="rotate" values="0;36" keyTimes="0;1" dur="0.2s" begin="0s" repeatCount="indefinite"></animateTransform><path d="M31.787644940070013 22.5952567846449 L40.272926314308584 31.08053815888347 L31.08053815888347 40.272926314308584 L22.5952567846449 31.787644940070013 A39 39 0 0 1 12.435586257897734 36.964255631926164 L12.435586257897734 36.964255631926164 L14.312799838380506 48.816515719067816 L1.4728514106437176 50.85016376459082 L-0.4043621698390538 38.997903677449166 A39 39 0 0 1 -11.666443704760365 37.21416519665136 L-11.666443704760365 37.21416519665136 L-17.114329701634926 47.90624348691178 L-28.697414516083704 42.00436699029767 L-23.249528519209143 31.312288700037254 A39 39 0 0 1 -31.31228870003725 23.24952851920915 L-31.31228870003725 23.24952851920915 L-42.00436699029767 28.69741451608371 L-47.90624348691178 17.114329701634936 L-37.21416519665136 11.666443704760372 A39 39 0 0 1 -38.99790367744916 0.404362169839061 L-38.99790367744916 0.404362169839061 L-50.85016376459081 -1.4728514106437085 L-48.816515719067816 -14.312799838380498 L-36.964255631926164 -12.435586257897729 A39 39 0 0 1 -31.78764494007002 -22.595256784644896 L-31.78764494007002 -22.595256784644896 L-40.27292631430859 -31.080538158883467 L-31.08053815888346 -40.27292631430859 L-22.59525678464489 -31.78764494007002 A39 39 0 0 1 -12.435586257897754 -36.96425563192616 L-12.435586257897754 -36.96425563192616 L-14.312799838380526 -48.81651571906781 L-1.4728514106437058 -50.85016376459081 L0.4043621698390664 -38.99790367744916 A39 39 0 0 1 11.666443704760344 -37.214165196651365 L11.666443704760344 -37.214165196651365 L17.1143297016349 -47.90624348691178 L28.69741451608371 -42.00436699029766 L23.249528519209154 -31.312288700037247 A39 39 0 0 1 31.312288700037236 -23.24952851920917 L31.312288700037236 -23.24952851920917 L42.00436699029765 -28.697414516083736 L47.90624348691177 -17.114329701634926 L37.21416519665136 -11.666443704760361 A39 39 0 0 1 38.99790367744916 -0.40436216983908313 L38.99790367744916 -0.40436216983908313 L50.85016376459081 1.4728514106436847 L48.816515719067816 14.312799838380506 L36.964255631926164 12.43558625789774 A39 39 0 0 1 31.78764494007003 22.595256784644874 M0 -22A22 22 0 1 0 0 22 A22 22 0 1 0 0 -22" fill="#00b0ff"></path></g></g> <g transform="translate(19 19) scale(0.6)"> <g>
                <animateTransform attributeName="transform" type="rotate" values="36;0" keyTimes="0;1" dur="0.2s" begin="-0.1s" repeatCount="indefinite"></animateTransform><path d="M-31.78764494007002 -22.595256784644896 L-40.27292631430859 -31.080538158883467 L-31.08053815888346 -40.27292631430859 L-22.59525678464489 -31.78764494007002 A39 39 0 0 1 -12.435586257897754 -36.96425563192616 L-12.435586257897754 -36.96425563192616 L-14.312799838380526 -48.81651571906781 L-1.4728514106437058 -50.85016376459081 L0.4043621698390664 -38.99790367744916 A39 39 0 0 1 11.666443704760344 -37.214165196651365 L11.666443704760344 -37.214165196651365 L17.1143297016349 -47.90624348691178 L28.69741451608371 -42.00436699029766 L23.249528519209154 -31.312288700037247 A39 39 0 0 1 31.312288700037236 -23.24952851920917 L31.312288700037236 -23.24952851920917 L42.00436699029765 -28.697414516083736 L47.90624348691177 -17.114329701634926 L37.21416519665136 -11.666443704760361 A39 39 0 0 1 38.99790367744916 -0.40436216983908313 L38.99790367744916 -0.40436216983908313 L50.85016376459081 1.4728514106436847 L48.816515719067816 14.312799838380506 L36.964255631926164 12.43558625789774 A39 39 0 0 1 31.78764494007003 22.595256784644874 L31.78764494007003 22.595256784644874 L40.272926314308606 31.080538158883442 L31.08053815888346 40.27292631430859 L22.59525678464489 31.78764494007002 A39 39 0 0 1 12.435586257897759 36.96425563192615 L12.435586257897759 36.96425563192615 L14.312799838380533 48.8165157190678 L1.4728514106437125 50.85016376459081 L-0.4043621698390616 38.99790367744916 A39 39 0 0 1 -11.666443704760406 37.214165196651344 L-11.666443704760406 37.214165196651344 L-17.114329701634972 47.906243486911755 L-28.69741451608372 42.00436699029766 L-23.249528519209154 31.31228870003725 A39 39 0 0 1 -31.312288700037275 23.249528519209118 L-31.312288700037275 23.249528519209118 L-42.00436699029769 28.697414516083676 L-47.90624348691178 17.114329701634922 L-37.21416519665136 11.666443704760365 A39 39 0 0 1 -38.997903677449166 0.40436216983901857 L-38.997903677449166 0.40436216983901857 L-50.85016376459082 -1.4728514106437582 L-48.816515719067816 -14.31279983838051 L-36.964255631926164 -12.435586257897734 A39 39 0 0 1 -31.787644940069992 -22.595256784644928 M0 -22A22 22 0 1 0 0 22 A22 22 0 1 0 0 -22" fill="#848484"></path></g></g></g>
            </svg>
        </div>
    </div>

    <div id="editor" ref="editor">
        <div v-if="!isLoading" class="editorData">
            <h3 class="sectionTitle" v-if="sections.length > 0">Sections</h3>
            <div v-if="sections.length > 0" class="tableSections">
                <div class="tableSection" v-for="(section, index) in sections" :key="index">
                    <div class="section-header">
                        <div class="sectionHeaderTitle">
                            <input v-if="section.isTitleEdit" v-model="section.title"/>
                            <h3 v-if="!section.isTitleEdit">{{section.title}}</h3>
                            
                            <span @click="editSectionTitle(section.id)">
                                <svg v-if="!section.isTitleEdit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" width="14px" height="14px" fill="currentColor">
                                <g><path d="M562.9,348.2L185.7,725.5l44.5,44.5l377.2-377.3L562.9,348.2z M651.8,437.1L274.6,814.4l88.9,88.9l377.3-377.2L651.8,437.1z M518.4,303.8L474,259.3L96.7,636.6l44.5,44.5L518.4,303.8z M971.6,206.3L793.8,28.4c-24.6-24.6-64.3-24.6-88.9,0L597.5,135.8l266.7,266.8l107.3-107.4C996.1,270.7,996.1,230.9,971.6,206.3z M10,990h188.6L10,801.4V990z M450.1,990h440.1v-62.9H450.1V990z"/></g>
                                </svg>

                                <svg v-if="section.isTitleEdit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" width="12px" height="12px" fill="currentColor">
                                <g><path d="M903.5,990H96.5c-34.6,0-57.6-23.1-57.6-57.6V67.6C38.8,33.1,61.9,10,96.5,10h57.6v230.6h403.5V10h172.9l230.6,230.6v691.8C961.2,966.9,938.1,990,903.5,990z M845.9,355.9H154.1v518.8h691.8V355.9z M730.6,586.5H269.4V471.2h461.2V586.5z M730.6,759.4H269.4V644.1h461.2V759.4z M327.1,10H500v172.9H327.1V10z"/></g>
                                </svg>
                            </span>
                        </div>
                        <div class="btns">
                            <span v-if="sections.length > 1" class="removeBtn" @click="removeSection(section.id)">+</span>
                            <span class="collapsible-btn" @click="toggleSection(index)">+</span>
                        </div>
                    </div>
                    
                    <div class="section-details">
                        <div class="sectionFields">
                            <div v-for="(field, i) in section.fields" :key="i" class="sectionField">
                                <span class="removeBtn removeFieldBtn" @click="removeField(section.id, field.id)">+</span>
                                <div class="field">
                                    <label>Logo</label>
                                    <div class="logoColumn">
                                        <div class="logoPreview">
                                            <img :src="field.logoUrl">
                                        </div>
                                        <button @click="uploadLogo(section.id, field.id)" class="siteLogo">Upload</button>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="sitescore">Site score</label>
                                    <input type="number" min="0" v-model="field.stars">
                                </div>
                                <div class="field">
                                    <label for="sitebonus">Site bonus</label>
                                    <input type="text" placeholder="100TL Bedava + 100 FreeSpin" v-model="field.bonusTxt">
                                </div>
                                <div class="field">
                                    <label for="sitebonus">Button link</label>
                                    <input type="url" placeholder="url" v-model="field.buttonLink">
                                </div>
                            </div>

                            <div class="addBtnBox">
                                <button title="Add a new field" @click="addField(section.id)"  class="addBtn addField">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="addBtnBox">
                <button @click="addSection" title="Add a new section" class="addBtn">+</button>
                <button v-if="sections.length > 0" class="saveDataBtn" @click="saveData">Save</button>
            </div>
        </div>
    </div>
</div>