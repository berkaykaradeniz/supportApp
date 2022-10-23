@include('panel.includes.header')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create A New Ticket</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <div class="container">
          <div class="form-group">
            <label for="exampleFormControlSelect2">Department</label>
            <select class="form-control" id="department">
              <option value="1">Yazılım</option>
              <option value="2">Ağ</option>
              <option value="3">Destek</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="email" class="form-control" id="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
          </div>
          <input type="text" id="user_id" value="0" hidden>
          <button class="btn btn-primary mt-5" onclick='getRandomUserForNewTicket();'>Send Ticket</button>
       </div>
    </main>
  </div>
</div>


<script>

getTickets();


</script>

@include('panel.includes.footer')