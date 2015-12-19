<link rel="stylesheet" href="<?php echo base_url("css/vmenuModule.css") ?>">

<div class="u-vmenu">
	  <ul>

	    <li> <a href="#">Item 1</a>

	      <ul>

	        <li><a href="#">Subitem 1</a> </li>

	        <li> <a href="#">Subitem 2</a>

	          <ul>

	            <li><a href="#">Subitem 1</a>

	              <ul>

	                <li><a href="#">Subitem 1</a> </li>

	                <li><a href="#">Subitem 2</a> </li>

	                <li><a href="#">Subitem 3</a> </li>

	                <li><a href="#">Subitem 4</a> </li>

	              </ul>

	            </li>

	            <li><a href="#">Subitem 2</a> </li>

	            <li><a href="#">Subitem 3</a> </li>

	            <li><a href="#">Subitem 4</a> </li>

	          </ul>

	        </li>

	        <li><a href="#">Subitem 3</a> </li>

	        <li> <a href="#">Subitem 4</a>

	          <ul>

	            <li><a href="#">Subitem 1</a> </li>

	            <li><a href="#">Subitem 2</a> </li>

	          </ul>

	        </li>

	        <li><a href="#">Subitem 5</a> </li>

	      </ul>

	    </li>

	    <li><a href="#">Item 2</a>

	      <ul>

	        <li><a href="#">Subitem 1</a> </li>

	        <li><a href="#">Subitem 2</a> </li>

	        <li><a href="#">Subitem 3</a> </li>

	        <li><a href="#">Subitem 4</a> </li>

	      </ul>

	    </li>

	    <li><a href="#">Item 3</a>

	      <ul>

	        <li><a href="#">Subitem 1</a> </li>

	        <li><a href="#">Subitem 2</a> </li>

	        <li><a href="#">Subitem 3</a> </li>

	        <li><a href="#">Subitem 4</a> </li>

	        <li><a href="#">Subitem 5</a> </li>

	        <li><a href="#">Subitem 6</a> </li>

	      </ul>

	    </li>

	    <li><a href="#">Item without subitems</a> </li>

	  </ul>

	</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

	<script src="<?php echo base_url("js/vmenuModule.js") ?>"></script>
        <script>
            $(".u-vmenu").vmenuModule({

	  Speed: 200,

	  autostart: true,

	  autohide: true

	});
            </script>