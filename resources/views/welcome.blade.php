<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/modal.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <style>
.center {
    margin: auto;
    width: 50%;
    text-align: center;
}
</style>
    <body>
      <div id="app">
        <div class="w3-container">
          <div class="center">
          <label>Search Title:</label>
          <input v-model="keyword" type="text" placeholder="Search anything" />
            <button onclick="document.getElementById('inputModal').style.display='block'" class="w3-button w3-green w3-large">ADD</button>
        </div>
        <div class="w3-row center">
          <div class="w3-card-8 w3-col m3 w3-margin w3-animate-zoom card"  v-for="post in filteredList">
              <a v-bind:href="post.link" target="_blank">
              <img v-bind:src="post.image"/>
              @{{post.title}}</a>
          </div>
        </div>
      </div>
      <div id="inputModal" class="w3-modal" v-if="showModal">
          <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center"><br>
              <span onclick="document.getElementById('inputModal').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
            </div>
            <div class="w3-container">
              <div class="w3-section">
                <label><b>Title</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Post Title" v-model="newItem.title" required>
                <label><b>Link</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Post Link" v-model="newItem.link" required>
                <label><b>Image</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Post Image" v-model="newItem.image" required>
                <button class="w3-button w3-block w3-green w3-section w3-padding" @click.prevent="addItem()">Submit</button>
              </div>
            </div>
          </div>
        </div>
  </div>
      <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
