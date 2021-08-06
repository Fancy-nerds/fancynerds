<?
/**
 * Search Form
 */
?>

<form role="search" method="get" class="search-form" action="<?= home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" placeholder="Search …" value="" name="s">
    </label>
    <button type="submit" class="search-submit" value="Search">
        <i class="flaticon-search"></i>
    </button>
</form>
