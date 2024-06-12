<?= $this->extend('layout/layout-default') ?>

<?= $this->section('page_title') ?>
    <?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <table class="table">
        <tr>
            <td>Bil</td>
            <td>Negeri</td>
            <td>Kod Negeri</td>
            </td>Tindakan</td>
        </tr>

        <?php 
         if($states ?? ''):
            foreach($states as $key => $value):
                // echo "<tr>";
                // echo "<td>".($key+1)."</td>";
                // echo "<td>".$value->name."</td>";
                // echo "</tr>";
          
        ?>
        <tr>
            <td><?= ($key+1)?></td>
            <td><?= $value->name?></td>
            <td><?= $value->states_code?></td>
            <td>
            <!-- <a href="<?= base_url('admin/states/edit/'.$value->id)?>" class="btn btn-primary">Edit</a> -->
            <a href="<?= url_to('admin.states.show',  $value->id)?>" class="btn btn-info">Paparan</a>
            </td>
                
        </tr>

        <?php
        endforeach;
    endif;
        ?>
        
    </table>

<?= $this->endSection() ?>