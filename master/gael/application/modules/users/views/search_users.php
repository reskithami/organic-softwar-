<div class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2"><?php echo $this->lang->line('name'). ' ' .$this->lang->line('email');?></label>
    <input type="text" class="form-control"  id="nom_clientsearchform" placeholder="Jane Doe">
    <input type="hidden" id="id_clientsearchform">
  </div>
  <button type="submit" class="btn btn-default" id="validuserfind"><?php echo $this->lang->line('validation');?></button>
</div>
<button type="submit" class="btn btn-default" id="newUsers"><?php echo $this->lang->line('new');?></button>
