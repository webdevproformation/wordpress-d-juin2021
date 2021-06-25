<form action="<?= home_url("/") ?>" class="d-flex <?= isset($args["class"]) ? $args["class"] : "" ?>">
    <input type="text" class="form-control" placeholder="rechercher" name="s" value="<?= get_search_query() ?>">
    <input type="submit" class="btn btn-outline-danger btn-sm ms-2">
</form>