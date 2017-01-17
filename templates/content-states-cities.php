<?php
global $wpdb;

if (isset($_REQUEST['state']) && ! empty($_REQUEST['state'])) {
    $sql = $wpdb->prepare('SELECT DISTINCT(StateName) FROM zipcodes WHERE StateAbbr=%s', $_REQUEST['state']);
    $statename = $wpdb->get_var($sql);
}

?>
<div class="links">
<?php
if ($statename) {
    echo '<h3>Donate in ' . $statename . '</h3>';
}

if (! isset($_REQUEST['state']) || empty($_REQUEST['state'])) {
    $states = $wpdb->get_results('SELECT DISTINCT(StateName),StateAbbr FROM zipcodes ORDER BY StateName ASC');

    $permalink = get_permalink($post->ID);

    $search_by_zip = get_post_meta($post->ID, 'search_by_zip', true);
    $zip_query = ( $search_by_zip && ( true == settype($search_by_zip, 'bool') ) ) ? '&zipcodes=true' : '';

  if ($states) {
    $cols = 4;
    $states_per_col = round(count($states) / $cols);

    $columns = array_chunk($states, $states_per_col);

    for ($x = 0; $x < $cols; $x++) {
      $format = '<div class="col-md-3" style="text-align: left;">%1$s</div>';
      $column_states = $columns[$x];
      $html = array();
      foreach ($column_states as $state) {
        $html[] = '<a href="' . $permalink . '?state=' . $state->StateAbbr . $zip_query . '" title="Donate in ' . esc_attr($state->StateName) . '">' . $state->StateName . '</a>';
      }
      $link_columns[] = sprintf($format, implode('<br />', $html));
    }

    $format = '<div class="row">%1$s</div>';
    echo sprintf($format, implode('', $link_columns));
  }
} else {
    $donate_page = get_page_by_title('Select Your Organization');
    $donate_link = get_permalink($donate_page->ID);

  if (true == $_REQUEST['zipcodes']) {
    $sql = $wpdb->prepare('SELECT DISTINCT(zipcode) FROM zipcodes WHERE stateAbbr="%s" ORDER BY zipcode ASC', $_REQUEST['state']);
    $zipcodes = $wpdb->get_results($sql);

    if ($zipcodes) {
      foreach ($zipcodes as $zipcode) {
        echo ' <a href="' . $donate_link . '?pcode=' . $zipcode->zipcode . '" title="Donation pick up in Zipcode ' . $zipcode->zipcode . ', ' . $statename . '">' . $zipcode->zipcode . '</a> ';
      }
    }
  } else {
    $sql = $wpdb->prepare('SELECT DISTINCT(CityName),zipcode FROM zipcodes WHERE stateAbbr="%s" GROUP BY CityName ORDER BY CityName ASC', $_REQUEST['state']);
    $cities = $wpdb->get_results($sql);

    if ($cities) {
      $cols = 3;
      $cities_per_col = round(count($cities) / $cols);

      $columns = array_chunk($cities, $cities_per_col);

      for ($x = 0; $x < $cols; $x++) {
        $format = '<div class="col-md-4" style="text-align: left;">%1$s</div>';
        $column_cities = $columns[$x];
        $html = array();
        foreach ($column_cities as $city) {
          $html[] = '<a href="' . $donate_link . '?pcode=' . $city->zipcode . '" title="' . esc_attr($city->CityName) . ', ' . $statename . ' donation pick up">' . $city->CityName . '</a>';
        }
        $link_columns[] = sprintf($format, implode('<br />', $html));
      }

      $format = '<div class="row">%1$s</div>';
      echo sprintf($format, implode('', $link_columns));
    }
  }
}
?>
</div>