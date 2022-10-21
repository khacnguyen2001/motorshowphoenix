<div class="topbar">
    <div class="toggle">
        <i class="fas fa-bars"></i>
    </div>

    <div class="search">
        <label>
            <input type="text" placeholder="Tìm kiếm" autocomplete="off">
            <i class="far fa-search"></i>
        </label>
    </div>
    <a class="box-user">
        <span class="name-user"><?php echo $users['fullname']?></span>
        <div class="user">
            <img src="<?php echo $users['image']?>" alt="avatar">
        </div>
    </a>
   
</div>