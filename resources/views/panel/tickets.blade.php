@include('panel.includes.header')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ticket List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href= "{{route('panel.tickets.create')}}"><button type="button" class="btn btn-sm btn-outline-secondary">Create New Ticket</button></a>
          </div>
        </div>
      </div>
      <div class="container">
        <table id="tickets"></table>

       </div>
    </main>
  </div>
</div>


<script>

getTickets();

</script>

@include('panel.includes.footer')