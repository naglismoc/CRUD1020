<table class="table border-top">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr>
                        <td> <?=$item->id?> </td>
                        <td> <?=$item->title?> </td>
                        <td> <?=$item->price?> </td>
                        <td> <?=$item->quantity?> </td>

                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$item->id?>">
                                <button type="submit" name="edit" class="btn btn-success">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?=$item->id?>">
                                <button type="submit" name="destroy" class="btn btn-danger">delete</button>
                            </form>
                        </td>

                </tr>
                <?php  } ?>
            </tbody>
        </table>