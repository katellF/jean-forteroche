<?php
while ($data = $allPosts->fetch()) {
?>

<div>
    <h3 class="text-center">
        <?= htmlspecialchars($data['title']) ?><br/>
        <em class="font_size_60">le <?= $data['creation_date_fr'] ?></em>
    </h3>
</div>

<?php
}
?>