<div class="wrap shortest-admin">
	<?php
        Shortest_Monetization::get_api_token();
        $withAPI = get_option('shst_api_ready');
        $token = get_option('shst_token');
    ?>
	<h2 class="shortest-header-widget"><?php echo esc_html(get_admin_page_title()); ?></h2>
    <div class="shortest-left">
        <form method="post" action="options.php">
            <?php settings_fields('shst-settings-group'); ?>
            <?php do_settings_sections('shst-settings-group'); ?>
            <div class="shortest-settings-group">
                <h2 class="shortest-header">Base Options</h2>
                <div class="shortest-options-group">
                    <?php if($withAPI): ?>
                    <label class="shortest-label" for="shst_token">Shorte.st email</label>
                    <input type="text" class="shortest-input-text" id="shst_email" name="shst_email"
                           value="<?php echo esc_html( get_option('shst_email') ); ?>"
                        />
                    <?php else: ?>
                    <label class="shortest-label" for="shst_token">API Token</label>
                    <input type="text" class="shortest-input-text" id="shst_token" name="shst_token"
                    value="<?php echo esc_html( $token ); ?>"
                    />
                    <?php endif; ?>
                </div>
                <?php if($withAPI): ?>
                    <h3 class="shortest-header">Your Public API token:</h3>
                    <p class=""><?php echo $token ? esc_html( $token ) : "INVALID"; ?></p>
                <?php endif ?>
            </div>
            <div class="shortest-settings-group">
                <div class="shortest-options-group">
                    <h2 class="shortest-header">Links </h2>
                    <div class="shortest-switcher <?php if(get_option('shst_fps_enabled')): ?>active<?php endif;?>" id="switcher01">
                        <div class="switch <?php if(get_option('shst_fps_enabled')): ?>on<?php endif;?>"></div>
                        <input type="checkbox" id="shst_fpsenabled" name="shst_fps_enabled" <?php if(get_option('shst_fps_enabled')): ?>checked="checked"<?php endif;?> value="1">
                    </div>
                </div>
                <div class="switcher-visibility switcher01  <?php if(get_option('shst_fps_enabled')): ?>active<?php endif;?>">
                    <div class="shortest-options-group">
                        <label class="shortest-label" for="shst_fps_selection_types">Domains selection type</label>
                        <select id="shst_fps_selection_types" name="shst_fps_selection_type" required="required">
                            <option value="<?= Shortest_Monetization::FPS_SELECTION_TYPE_EXCLUDE ?>"
                                <?php if(intval(get_option('shst_fps_selection_type')) === Shortest_Monetization::FPS_SELECTION_TYPE_EXCLUDE):?>
                                    selected="selected"
                                <?php endif;?>>Exclude
                            </option>
                            <option value="<?= Shortest_Monetization::FPS_SELECTION_TYPE_INCLUDE ?>"
                                <?php if(intval(get_option('shst_fps_selection_type')) === Shortest_Monetization::FPS_SELECTION_TYPE_INCLUDE):?>
                                    selected="selected"
                                <?php endif;?>>Include
                            </option>
                        </select>
                    </div>
                    <div class="shortest-options-group">
                        <label class="shortest-label" for="shst_fps_domains_list">Domains list (comma separated)</label>
                        <textarea class="shortest-textarea" id="shst_fps_domains_list" name="shst_fps_domains_list" rows="1" cols="100"><?php
                            echo esc_html(get_option('shst_fps_domains_list'));
                        ?></textarea>
                    </div>
                    <div class="shortest-options-group">
                        <h3 class="shortest-header">Capping</h3>
                        <input type="text" class="shortest-capping-input-text shortest-input-text shortest-number" id="shst_fps_capping_limit" name="shst_fps_capping_limit"
                               value="<?php echo esc_html( get_option('shst_fps_capping_limit') ); ?>"
                            />
                        <div class="sep">/</div>
                        <input type="text" class="shortest-capping-input-text shortest-input-text shortest-number" id="shst_fps_capping_timeout" name="shst_fps_capping_timeout"
                                value="<?php echo esc_html( get_option('shst_fps_capping_timeout') ); ?>"
                            />
                        <div class="sep">hours</div>
                    </div>
                </div>
            </div>
            <div class="shortest-settings-group">
                <div class="shortest-options-group">
                    <h2 class="shortest-header">Entries</h2>
                    <div class="shortest-switcher <?php if(get_option('shst_es_enabled')): ?>active<?php endif;?>" id="switcher03">
                        <div class="switch <?php if(get_option('shst_es_enabled')): ?>on<?php endif;?>"></div>
                        <input type="checkbox" id="shst_fpsenabled" name="shst_es_enabled" <?php if(get_option('shst_es_enabled')): ?>checked="checked"<?php endif;?> value="1">
                    </div>
                </div>
                <div class="switcher-visibility switcher03 <?php if(get_option('shst_es_enabled')): ?>active<?php endif;?>">
                    <div class="shortest-options-group">
                        <label class="shortest-label" for="shst_es_types">Trigger</label>
                        <select id="shst_es_types" name="shst_es_type" required="required">
                            <option value="<?= Shortest_Monetization::ES_TYPE_CLICK ?>"
                                    <?php if(intval(get_option('shst_es_type')) === Shortest_Monetization::ES_TYPE_CLICK): ?>
                                        selected="selected"
                                    <?php endif;?>>Click
                            </option>
                            <option class="js-timeout" value="<?= Shortest_Monetization::ES_TYPE_TIMEOUT ?>"
                                    <?php if(intval(get_option('shst_es_type')) === Shortest_Monetization::ES_TYPE_TIMEOUT): ?>
                                        selected="selected"
                                    <?php endif;?>>Timeout
                            </option>
                        </select>
                    </div>
                    <div class="js-timeout-opt switcher-visibility <?php if(intval(get_option('shst_es_type')) === Shortest_Monetization::ES_TYPE_TIMEOUT): ?>
                                        active
                                    <?php endif;?>">
                        <div class="shortest-options-group">
                            <label class="shortest-label" for="shst_es_timeout">Timeout (miliseconds)</label>
                            <input type="text" class="shortest-input-text shortest-number" id="shst_es_timeout" name="shst_es_timeout"
                                   value="<?php echo esc_html( get_option('shst_es_timeout') ); ?>"
                                />
                        </div>
                    </div>

                    <div class="shortest-options-group">
                        <h3 class="shortest-header">Capping</h3>
                        <input type="text" class="shortest-capping-input-text shortest-input-text shortest-number" id="shst_es_capping_limit" name="shst_es_capping_limit"
                               value="<?php echo esc_html( get_option('shst_es_capping_limit') ); ?>"
                            />
                        <div class="sep">/</div>
                        <input type="text" class="shortest-capping-input-text shortest-input-text shortest-number" id="shst_es_capping_timeout" name="shst_es_capping_timeout"
                               value="<?php echo esc_html( get_option('shst_es_capping_timeout') ); ?>"
                            />
                        <div class="sep">hours</div>
                    </div>
                </div>
            </div>
            <div class="shortest-settings-group">
                <div class="shortest-options-group">
                    <h2 class="shortest-header">Exits</h2>
                    <div class="shortest-switcher <?php if(get_option('shst_exs_enabled')): ?>active<?php endif;?>" id="switcher09">
                        <div class="switch <?php if(get_option('shst_exs_enabled')): ?>on<?php endif;?>"></div>
                        <input type="checkbox" id="shst_exsenabled" name="shst_exs_enabled" <?php if(get_option('shst_exs_enabled')): ?>checked="checked"<?php endif;?> value="1">
                    </div>
                </div>
            </div>
            <div class="shortest-settings-group">
                <div class="shortest-options-group">
                    <h2 class="shortest-header">Pop Ads</h2>
                    <div class="shortest-switcher <?php if(get_option('shst_pop_enabled')): ?>active<?php endif;?>" id="switcher09">
                        <div class="switch <?php if(get_option('shst_pop_enabled')): ?>on<?php endif;?>"></div>
                        <input type="checkbox" id="shst_popenabled" name="shst_pop_enabled" <?php if(get_option('shst_pop_enabled')): ?>checked="checked"<?php endif;?> value="1">
                    </div>
                </div>
            </div>
            <div class="shortest-settings-group last">
            <input type="hidden" name="shst_email_changed" value="1" />
            <input type="submit" value="Save Changes" class="shortest-submit" id="submit" name="submit">
            </div>
        </form>
    </div>
    <div class="shortest-right">
        <h2 class="shortest-header">Quick help</h2>
        <h3 class="shortest-header">What is API Token?</h3>
        <p class="shortest-paragraph-help">It's your unique ID number automatically generated when you register on Shorte.st website. You can view it on tools page after logging in. If you don't have an account please register by clicking the following button.
        <a href="https://shorte.st/register/?utm_source=wordpress&utm_medium=plugin&utm_campaign=plugin" class="shortest-submit">Register on shorte.st</a></p>
        <h3 class="shortest-header">Links</h3>
        <p class="shortest-paragraph-help">This monetization module will monetize your internal and external links.</p>
        <h3 class="shortest-header">Entries</h3>
        <p class="shortest-paragraph-help">This monetization module monetize all of entrances to your webiste through shorte.st intermediate page.</p>
        <h3 class="shortest-header">Exits</h3>
        <p class="shortest-paragraph-help">This monetization module monetize your bouncing traffic.</p>
        <h3 class="shortest-header">Pop Ads</h3>
        <p class="shortest-paragraph-help">This script allows you to enable additional ads on your website - Pop Ads. When a user visits a website with pop advertisements, they will open up in a new browser window hidden under the user’s current browser. It’s activated “on click” made by user on your website. Standard capping is set to 1 ad per 24 hours.</p>
    </div>
</div>