<!DOCTYPE html>
<!--Code By Webdevtrick ( https://webdevtrick.com )-->
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Responsive Table with Detail View | Webdevtrick.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<style type="text/css">
    /* Code By Webdevtrick ( https://webdevtrick.com ) */
* {
  box-sizing: border-box;
}

html.open, body.open {
  height: 100%;
  overflow: hidden;
}

html {
  padding: 40px;
  font-size: 62.5%;
}

body {
  padding: 20px;
  background-color: #5BB9B8;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  color: #fff;
  font-size: 1.6rem;
  font-family: 'Lato', sans-serif;
}

p {
  text-align: center;
  margin: 20px 0 60px;
}

main {
  background-color: #2C3845;
}

h1 {
  text-align: center;
  font-weight: 300;
}

table {
  display: block;
}

tr, td, tbody, tfoot {
  display: block;
}

thead {
  display: none;
}

tr {
  padding-bottom: 10px;
}

td {
  padding: 10px 10px 0;
  text-align: center;
}
td:before {
  content: attr(data-title);
  color: #7a91aa;
  text-transform: uppercase;
  font-size: 1.4rem;
  padding-right: 10px;
  display: block;
}

table {
  width: 100%;
}

th {
  text-align: left;
  font-weight: 700;
}

thead th {
  background-color: #202932;
  color: #fff;
  border: 1px solid #202932;
}

tfoot th {
  display: block;
  padding: 10px;
  text-align: center;
  color: #b8c4d2;
}

.button {
  line-height: 1;
  display: inline-block;
  font-size: 1.2rem;
  text-decoration: none;
  border-radius: 5px;
  color: #fff;
  padding: 8px;
  background-color: #4b908f;
}

.select {
  padding-bottom: 20px;
  border-bottom: 1px solid #28333f;
}
.select:before {
  display: none;
}

.detail {
  background-color: #BD2A4E;
  width: 100%;
  height: 100%;
  padding: 40px 0;
  position: fixed;
  top: 0;
  left: 0;
  overflow: auto;
  -moz-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -moz-transition: -moz-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  -webkit-transition: -webkit-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
}
.detail.open {
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -webkit-transform: translateX(0);
  transform: translateX(0);
}

.detail-container {
  margin: 0 auto;
  padding: 40px;
  max-width: 500px;
}

dl {
  margin: 0;
  padding: 0;
}

dt {
  font-size: 2.2rem;
  font-weight: 300;
}

dd {
  margin: 0 0 40px 0;
  font-size: 1.8rem;
  padding-bottom: 5px;
  border-bottom: 1px solid #ac2647;
  box-shadow: 0 1px 0 #c52c51;
}

.close {
  background: none;
  padding: 18px;
  color: #fff;
  font-weight: 300;
  border: 1px solid rgba(255, 255, 255, 0.4);
  border-radius: 4px;
  line-height: 1;
  font-size: 1.8rem;
  position: fixed;
  right: 40px;
  top: 20px;
  -moz-transition: border 0.3s linear;
  -o-transition: border 0.3s linear;
  -webkit-transition: border 0.3s linear;
  transition: border 0.3s linear;
}
.close:hover, .close:focus {
  background-color: #a82545;
  border: 1px solid #a82545;
}

@media (min-width: 460px) {
  td {
    text-align: left;
  }
  td:before {
    display: inline-block;
    text-align: right;
    width: 140px;
  }

  .select {
    padding-left: 160px;
  }
}
@media (min-width: 720px) {
  table {
    display: table;
  }

  tr {
    display: table-row;
  }

  td, th {
    display: table-cell;
  }

  tbody {
    display: table-row-group;
  }

  thead {
    display: table-header-group;
  }

  tfoot {
    display: table-footer-group;
  }

  td {
    border: 1px solid #28333f;
  }
  td:before {
    display: none;
  }

  td, th {
    padding: 10px;
  }

  tr:nth-child(2n+2) td {
    background-color: #242e39;
  }

  tfoot th {
    display: table-cell;
  }

  .select {
    padding: 10px;
  }
}
</style>
<body>
<h1>
  Users List
</h1>
<p>
  example table with detail view 
</p>
<main>
  <table>
    <thead>
      <tr>
        <th>
          User's Name
        </th>
        <th>
          E-mail
        </th>
        <th></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan='3'>
          Year: 2020
        </th>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <td data-title='Provider Name'>
          John Doe
        </td>
        <td data-title='E-mail'>
          e-mail@test-email.com
        </td>
        <td class='select'>
          <a class='button' href='#'>
            Select
          </a>
        </td>
      </tr>
      <tr>
        <td data-title='Provider Name'>
          John Doe
        </td>
        <td data-title='E-mail'>
          e-mail@test-email.com
        </td>
        <td class='select'>
          <a class='button' href='#'>
            Select
          </a>
        </td>
      </tr>
      <tr>
        <td data-title='Provider Name'>
          John Doe
        </td>
        <td data-title='E-mail'>
          e-mail@test-email.com
        </td>
        <td class='select'>
          <a class='button' href='#'>
            Select
          </a>
        </td>
      </tr>
      <tr>
        <td data-title='Provider Name'>
          John Doe
        </td>
        <td data-title='E-mail'>
          e-mail@test-email.com
        </td>
        <td class='select'>
          <a class='button' href='#'>
            Select
          </a>
        </td>
      </tr>
    </tbody>
  </table>
  <div class='detail'>
    <div class='detail-container'>
      <dl>
        <dt>
          Provider Name
        </dt>
        <dd>
          John Doe
        </dd>
        <dt>
          E-mail
        </dt>
        <dd>
          email@example.com
        </dd>
        <dt>
          City
        </dt>
        <dd>
          Detroit
        </dd>
        <dt>
          Phone-Number
        </dt>
        <dd>
          555-555-5555
        </dd>
        <dt>
          Last Update
        </dt>
        <dd>
          May 15 2020
        </dd>
        <dt>
          Notes
        </dt>
        <dd>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
        </dd>
      </dl>
    </div>
    <div class='detail-nav'>
      <button class='close'>
        Close
      </button>
    </div>
  </div>
</main>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  >
    // Code By Webdevtrick ( https://webdevtrick.com )
$('.button, .close').on('click', function(e) {
  e.preventDefault();
  $('.detail, html, body').toggleClass('open');
});
</script>

</body>
</html>