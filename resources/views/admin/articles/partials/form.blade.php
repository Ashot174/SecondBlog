<label for="">Статус</label>
<select class="form-control" name="published">
    @if (isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{isset($article->title) ? $article->title : ""}}" required>

<label for="">Slug (unique)</label>
<input class="form-control" type="text" name="slug" value="{{isset($article->slug) ? $article->slug : ""}}" placeholder="Автоматическая генерация"  readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" name="description_short" id="description_short" >{{isset($article->description_short) ? $article->description_short : ""}}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" name="description" id="description" >{{isset($article->description) ? $article->description : ""}}</textarea>

<hr />

<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{isset($article->meta_title) ? $article->meta_title : ""}}">

<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{isset($article->meta_description) ? $article->meta_description : ""}}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{isset($article->meta_keyword) ? $article->meta_keyword : ""}}">

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
