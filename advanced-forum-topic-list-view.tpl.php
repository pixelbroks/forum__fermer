<?php
/**
 * @file
 * views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * @ingroup views_templates
 */
?>
 <div id="forum-topic-list">
  <?php if (!empty($title)) : ?>
    <caption><?php print $title; ?></caption>
  <?php endif; ?>

  <div class="forum-table forum-table-topics <?php print $classes; ?>">
    <div class="forum__superheader">
      <!-- Forum name -->
      <div class="forum__name">
        <?php if (empty($table_info->link)): ?>
          <div class="col-xs-6 col-sm-5 col-md-7 author-pane">Тема / автор </div>
        <?php else: ?>
        <div class="col-xs-6 col-sm-5 col-md-7 answer">Тема / автор</div>
        <?php endif; ?>
        <div class="col-xs-1 col-sm-1 col-md-1 views-vi">Ответов</div>
        <div class="col-xs-1 col-sm-1 col-md-1 forum__comments">Представления</div>
        <div class="col-xs-3 col-sm-4 col-md-2 forum__last-comment pull-right"><?php print t('Last post'); ?></div>
      </div>
      <!-- End forum name -->
    </div>
    <div>
      <?php foreach ($rows as $count => $row): ?>
        <div class="<?php print implode(' ', $row_classes[$count]); ?> row">
          <?php if (empty($shadow[$count])): ?>

              <?php /* To add popup from teaser in the title of the td, add: title="<?php print $teasers[$count] ?>"*/ ?>

              <div class="views-field-<?php print $fields[$field]; ?>">
               <?php /* Extra label for stickies. */ ?>
               <?php if ($field == 'title' && !empty($sticky[$count])): ?>
                 <div class="sticky-label"><?php print t('Sticky:'); ?></div>
               <?php endif; ?>
               <?php print $content; ?>
             </div>
             <div class="column topic__icons views-field-<?php print $fields['topic_icon']; ?>">
               <?php print $row['topic_icon']; ?>
             </div>
             <div class="column col-xs-12 col-sm-5 col-md-7 col-lg-7 topic__title views-field-<?php print $fields['topic_title']; ?>">
               <?php print $row['title']; ?>
             </div>
             <div class="column col-xs-12 col-sm-1 col-md-1 col-lg-1 topic__comments-count">
               <?php print $row['comment_count']; ?>
             </div>
             <div class="column col-xs-12 col-sm-1 col-md-1 col-lg-1 topic__total-count">
               <?php print $row['totalcount']; ?>
             </div>
             <div class="column col-xs-12 col-sm-4 col-md-2 col-lg-2 topic__last-comment pull-right">
               <?php print "<div class='reply'>Последнее сообщение: &nbsp; </div> " . $row['last_comment_name']; ?>
               <?php print $row['last_updated']; ?>
             </div>
          <?php else: ?>
            <?php /* For shadow posts, we print only the icon and themed notice. */ ?>

            <div class="column col-xs-2 col-sm-2 col-md-2 forum__posts views-field-<?php print $fields['topic_icon']; ?>">
              <?php print $fields['topic_icon']; ?>
            </div>

            <div class="column col-xs-2 col-sm-2 col-md-2 forum__last-reply pull-right" colspan="<?php print count($header) - 1; ?>">
               <?php print  $shadow[$count]; ?>
            </div>

          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script>
 // function setEqualHeight(columns) {
 //     var tallestcolumn = 0;
 //     columns.each(
 //     function() {
 //     currentHeight = $(this).height();
 //     if(currentHeight > tallestcolumn) {
 //     tallestcolumn = currentHeight;
 //     }
 //     });
 //     columns.height(tallestcolumn);
 // }
 // $(document).ready(function() {
 //     setEqualHeight($(".column"));
 // });
</script>
