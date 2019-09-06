<?php
/**
 * @var AppView $this
 * @var Article $article
 */

use App\Model\Entity\Article;
use App\View\AppView;
?>
<style>
    @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Raleway:400,800,900");
    /*
        Future Imperfect by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    */

    a {
        -moz-transition: color 0.2s ease, border-bottom-color 0.2s ease;
        -webkit-transition: color 0.2s ease, border-bottom-color 0.2s ease;
        -ms-transition: color 0.2s ease, border-bottom-color 0.2s ease;
        transition: color 0.2s ease, border-bottom-color 0.2s ease;
        border-bottom: dotted 1px rgba(160, 160, 160, 0.65);
        color: inherit;
        text-decoration: none;
    }

    a:before {
        -moz-transition: color 0.2s ease;
        -webkit-transition: color 0.2s ease;
        -ms-transition: color 0.2s ease;
        transition: color 0.2s ease;
    }

    a:hover {
        border-bottom-color: transparent;
        color: #2ebaae !important;
    }

    a:hover:before {
        color: #2ebaae !important;
    }

    strong, b {
        color: #3c3b3b;
        font-weight: 700;
    }


    h1, h2, h3, h4, h5, h6 {
        color: #3c3b3b;
        font-family: "Raleway", Helvetica, sans-serif;
        font-weight: 800;
        letter-spacing: 0.25em;
        line-height: 1.8;
        margin: 0 0 1em 0;
        text-transform: uppercase;
    }

    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
        color: inherit;
        border-bottom: 0;
        text-align: center;
    }

    h2 {
        font-size: 0.7em;
        text-align: center;
    }

    h3 {
        font-size: 0.9em;
    }

    h4 {
        font-size: 0.7em;
    }

    h5 {
        font-size: 0.7em;
    }

    h6 {
        font-size: 0.7em;
    }

    sub {
        font-size: 0.8em;
        position: relative;
        top: 0.5em;
    }

    sup {
        font-size: 0.8em;
        position: relative;
        top: -0.5em;
    }


    pre code {
        display: block;
        line-height: 1.75em;
        padding: 1em 1.5em;
        overflow-x: auto;
    }

    .post {
        width:96.5%;
        height:auto;
        background: white;
        margin-bottom: 100px;
        padding-bottom: 100px;
        text-align: center;
    }

    p.body{
        font-weight: bold;
        text-align: center;
        margin:80px;
        padding-bottom: 10px;
    }

    button.Prev{
        background-color: #cccccc;
        margin-right: 980px;
        margin-left: 20px;
    }

    button.Next{
        background-color: #cccccc;
    }
    /* Row */

    .row {
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        align-items: stretch;
    }


</style>



<!--    --><?php //$this->assign('heading-class', 'post-heading');?>
<!--    --><?php //$this->assign('heading', $article->title);?>
<!--    --><?php //$this->assign('meta', "Posted on {$article->created->toFormattedDateString()}") ?>

    <div class="post">
        <h1><?= $article->title ?></h1>
        <h2>Post by The Big Job | <?= "Posted on {$article->created->toFormattedDateString()}"?></h2>
        <p class="body"><?= $article->body ?></p>
    </div>


<!--<button class="Prev"><a href="{{url}}" >&lt;</a></button>-->
<!--<button class="Next"><a href="{{url}}" >&gt;</a></button>-->

<?php
/*
 * Intentionally don't escape this output via h($article->body), because it contains HTML which we want to display
 * to the user. Instead, we have made sure the code is safe from XSS attacks because we use HTMLPurifier to strip
 * any dangerous HTML tags before we save it to the database.
 */
?>

