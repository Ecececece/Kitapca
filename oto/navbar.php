<div style="width: 100%; position: fixed; top: 0; left: 0; z-index: 1000; background-color: #f2e5d0; box-shadow: 0px 3px 40px 10px rgba(78,50,32,0.60);">
    <header>
        <a href="index.php"><img src="images/logo.png" alt="Logo" height="100"></a>

        <form method="post" class="searchDiv" style="display: inline-flex; align-items: center;">
            <input type="text" name="searchText" placeholder="Aradığınız ürünün adını yazınız..." class="search" style="height: 50px; font-size: 16px; padding: 0 10px;">
            <input type="image" src="images/search.png" name="searchButton" style="height: 50px; width: 50px;">
        </form>

        <a href="admin.php" class="headerButton" style="color: #4e3220;">
            <img src="images/admin.png" alt="admin" height="40">
            Admin
        </a>

        <a href="sepet.php" class="headerButton" style="color: #4e3220;">
            <img src="images/sepet.png" alt="sepet" height="40">
            Sepetim
        </a>
    </header>

    <nav>
        <a href="tum.php" class="navButton" style="border-left: 2px solid #4e3220; color: #4e3220;">Tüm Kitaplar</a>
        <a href="roman.php" class="navButton" style="color: #4e3220;">Roman</a>
        <a href="oyku.php" class="navButton" style="color: #4e3220;">Öykü</a>
        <a href="siir.php" class="navButton" style="color: #4e3220;">Siir</a>
        <a href="cizgiroman.php" class="navButton" style="color: #4e3220;">Çizgi Roman</a>
        <a href="cocuk.php" class="navButton" style="color: #4e3220;">Çocuk Kitapları</a>
    </nav>
</div>

<?php
    if(isset($_POST["searchText"])){
        $searchText = trim($_POST["searchText"]);
        header("Location: search.php?searchText=" . urlencode($searchText));
        exit();
    }
?>
