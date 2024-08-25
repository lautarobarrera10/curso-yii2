{use class="yii\helpers\Html"}

<h1>Todos los libros
    {if $titulo < 2}Pocos
    {else} Muchos
    {/if}
</h1>

<ol>
    {foreach $books as $book}
        <li>{Html::a($book->toString(), ['book/detail', 'id' => $book->id])}</li>
    {/foreach}
</ol>