<form action="" method="post" class="">

    <div class="form-group">
        <label for="f1">Prekės pavadinimas</label>
        <input type="text" name="title" id="f1" class="form-control" value="<?= ($edit)? $item->title : "" ?>">
    </div>
    <div class="form-group">
        <label for="f2">Kaina</label>
        <input type="number" step=".01" name="price" id="f2" class="form-control"  value="<?= ($edit)? $item->price : "" ?>">
    </div>
    <div class="form-group">
        <label for="f3">Turimas prekių kiekis sandelyje</label>
        <input type="number" name="quantity" id="f3" class="form-control"  value="<?= ($edit)? $item->quantity : "" ?>">
    </div>
    <div class="form-group">
        <label for="f4">Prekės aprašymas</label>
        <textarea name="description" cols="40" rows="3" id="f4" class="form-control" > <?= ($edit)? $item->description : "" ?> </textarea>
    </div>
    <?php if($edit){ ?>
        <input type="hidden" name="id" value="<?=$item->id?>">
        <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Atnaujinti</button>
    <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3">Išsaugoti</button>
    <?php } ?>
</form>