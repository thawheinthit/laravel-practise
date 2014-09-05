<div class="container">
    <nav class="nav" style="float:left">

    {{ link_to('/', "Home", $attributes = array('class' => 'nav-item active'), $secure = null) }}	
    {{ link_to('/', "About", $attributes = array('class' => 'nav-item'), $secure = null) }}	
    {{ link_to('/', "FAQ", $attributes = array('class' => 'nav-item'), $secure = null) }}	
    {{ link_to('/', "Contact", $attributes = array('class' => 'nav-item'), $secure = null) }}	
     
    </nav>

    <nav class="nav" style="float:right">
    	{{ link_to('/login', "Login", $attributes = array('class' => 'nav-item'), $secure = null) }}
    </nav>
</div>

