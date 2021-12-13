<div class="container" style="margin-top: 5%;">

<form action="<?= URLROOT ?>/user/csvimport" method="post" enctype="multipart/form-data">
	<input type="file" name="upload" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
            </form>

<div class="card" style="padding: 20px;margin-top: 30px;">

<form action="<?= URLROOT ?>/user/track" method="post">
    <div class="row">
        <div class="col-md col-sm">
    <input type="text" name="company_name" placeholder="stock_name" />
</div>
    <div class="col-md col-sm">
     <input type="date" name="from_date" />
 </div>
     <div class="col-md col-sm">
      <input type="date" name="end_date" />
  </div>
      <div class="col-md col-sm">
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
            </div>
            </form>
        </div>
    </div>
</div>
