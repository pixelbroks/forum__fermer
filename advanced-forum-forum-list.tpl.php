<?php foreach ($tables as $table_id => $table): ?>
  <?php $table_info = $table['table_info']; ?>

  <div class="forum__wrap row">
   <div class="container">
      <!-- Header -->
      <div class="forum__superheader">

        <!-- Forum name -->
        <div class="forum__name">
          <?php if (empty($table_info->link)): ?>
            <div class="col-xs-6 col-sm-7 col-md-7 forum-topics"><?php print $table_info->name; ?></div>
          <?php else: ?>
          <div class="col-xs-6 col-sm-7 col-md-7 forum-topics"><a href="<?php print $table_info->link; ?>"><?php print $table_info->name; ?></a></div>
          <?php endif; ?>
          <div class="col-xs-1 col-sm-1 col-md-1 forum__topics"><?php print t('Topics'); ?></div>
          <div class="col-xs-2 col-sm-2 col-md-2 forum__posts"><?php print t('Posts'); ?></div>
          <div class="col-xs-2 col-sm-2 col-md-2 forum__last-post pull-right"><?php print t('Last post'); ?></div>
        <?php if ($collapsible): ?>
          <span id="forum-collapsible-<?php print $table_info->tid; ?>" class="forum-collapsible" >&nbsp;</span>
        <?php endif; ?>
        </div>
        <!-- End forum name -->
      </div>

      <!-- End header -->

      <div id="forum-table-<?php print $table_info->tid; ?>">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 forum-grid">
          <!-- Subheader  -->
          <div class="forum-subheader">
            <!-- Description -->
            <?php if (!empty($table_info->description)): ?>
            <div class="forum__description">
            <?php print $table_info->description; ?>
            </div>
            <?php endif; ?>
            <!-- End description -->
          </div>
          <!-- End subheader -->

          <div id="forum-table-<?php print $table_info->tid; ?>-content">
            <?php foreach ($table['items'] as $item_id => $item): ?>
              <?php if ($item->is_container): ?>

                <div id="subcontainer-<?php print $item_id; ?>" class="forum-row <?php print $item->zebra; ?> container-<?php print $item_id; ?>-child">
                <?php else: ?>

                <div id="forum-<?php print $item_id; ?>" class="forum-row col-xs-12 col-sm-12 col-md-12  <?php print $item->zebra; ?> container-<?php print $item_id; ?>-child" >
                <?php endif; ?>

                <?php $colspan = ($item->is_container) ? 4 : 1 ?>
                <!-- Forum details  -->

                <div class="forum-details">
                    <div class="col-xs-1 col-sm-1 col-md-1 forum-image">
                      <?php if (!empty($item->forum_image)): ?>
                        <div class=" forum-image forum-image-<?php print $item_id; ?>">
                          <?php print $item->forum_image; ?>
                        </div>

                      <?php else: ?>
                        <div class="<?php print $item->icon_classes ?>">
                          <span class="forum-list-icon-wrapper"><span><?php print $item->icon_text ?></span></span>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div class="forum__text col-xs-6 col-sm-6 col-md-6">
                      <div class="forum-name">
                        <a href="<?php print $item->link; ?>"><?php print $item->name; ?></a>
                      </div>
                      <?php if (!empty($item->description)): ?>
                        <div class="forum-description">
                          <?php print $item->description; ?>
                        </div>
                      <?php endif; ?>

                      <?php if (!empty($item->subcontainers)): ?>
                        <div class="forum-subcontainers">
                          <span class="forum-subcontainers-label"><?php print t("Subcontainers") ?>:</span> <?php print $item->subcontainers; ?>
                        </div>
                      <?php endif; ?>

                      <?php if (!empty($item->subforums)): ?>
                        <div class="forum-subforums">
                          <span class="forum-subforums-label"><?php print t("Subforums") ?>:</span> <?php print $item->subforums; ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <!-- Forum number topics -->
                    <?php if (!$item->is_container): ?>
                      <div class="col-xs-1 col-sm-1 col-md-1 forum-number-topics">
                        <div class="forum-number-topics"><?php print $item->total_topics ?>
                          <?php if ($item->new_topics): ?>
                            <div class="forum-number-new-topics">
                              <a href="<?php print $item->new_topics_link; ?>"><?php print $item->new_topics_text; ?></a>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                      <!-- End -->

                      <!-- Forum number posts -->
                      <div class="col-xs-2 col-sm-2 col-md-2 forum-number-posts">
                        <?php print $item->total_posts ?>
                        <?php if ($item->new_posts): ?>
                          <br />
                          <a href="<?php print $item->new_posts_link; ?>">
                            <?php print $item->new_posts_text; ?></a>
                        <?php endif; ?>
                      </div>
                      <!-- End -->

                      <!-- Forum reply -->
                      <div class="col-xs-2 col-sm-2 col-md-2 pull-right forum-last-reply">
                        <?php print $item->last_post ?>
                      </div>
                      <!-- End -->

                    <?php endif; ?>
                </div>
                <!-- End -->
              </div>

            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>
