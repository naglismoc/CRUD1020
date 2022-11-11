<form action="" method="get" class="row mt-3 mb-3">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="row">
        <div class="col-2">
        <select class="form-select" name="filter">
        <option value="">visi</option>

            <?php foreach ($params as $key => $param) {?>
                <option <?= (isset($_GET['filter'])) ? ($_GET['filter'] == $param) ? "selected" : "" : "" ?> value="<?=$param?>"><?=$param?></option>
            <?php } ?>
            
        </select>
    </div>
    <div class="col-6">
        <div class="row">
        <div class="col-6">
            <div class="form-group">
            <!-- <label for="f2">Kaina</label> -->
                <input type="text" name="from" class="form-control" value="<?=(isset($_GET['from'])) ? $_GET['from'] : ""?>"  >
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
            <!-- <label for="f2">Kaina</label> -->
                <input type="text" name="to" class="form-control"  value="<?=(isset($_GET['to'])) ? $_GET['to'] : ""?>">
            </div>
        </div>
        </div>
    </div>
    <div class="col-2">
        <select class="form-select" name="sort">
            <option  value="0">Rūšiuoti</option>
            <option <?= (isset($_GET['sort'])) ? ($_GET['sort'] == 1) ? "selected" : "" : "" ?>  value="1">price 0-9</option>
            <option <?= (isset($_GET['sort'])) ? ($_GET['sort'] == 2) ? "selected" : "" : "" ?>  value="2">price 9-0</option>
            <option <?= (isset($_GET['sort'])) ? ($_GET['sort'] == 3) ? "selected" : "" : "" ?>  value="3">Title a-z</option>
            <option <?= (isset($_GET['sort'])) ? ($_GET['sort'] == 4) ? "selected" : "" : "" ?>  value="4">Title z-a</option>
        </select>
    </div>
    <div class="col-2">
        <button class="btn btn-primary" type="submit">Ieškoti</button>
    </div>
        </div>
    </div>
    <div class="col-2"></div>
</form>