<div class="boxphaidmsp">
        <div class="sp-row1">
            <?php
            foreach ($dssp as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;
                echo '<div class="sp1">
                <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
                <p><a href="' . $linksp . '">' . $name . '</a></p>
                <h3>$' . $price . '</h3>
            </div>';
            }
            ?>
        </div>
    </div>