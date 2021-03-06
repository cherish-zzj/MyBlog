<?php

namespace App;

use Carbon\Carbon;
use App\Services\Markdowner;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $table = 'articles';
    protected $dates = ['published_at'];
    protected $fillable=[
        'title',
        'user_id',
        'subtitle',
        'content_raw',
        'page_image',
        'meta_description',
//        'layout',
        'is_draft',
        'published_at',
    ];

    public function setPublishedAtAttribute($date){
        //未来日期的当前时间
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);

    }

    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());
    }

    public function user(){
        return $this->belongsTo('App\User');
    }




    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'articles_tag_pivot')->withTimestamps();
    }

    /**
     * Set the title attribute and automatically the slug
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

       /* if (! $this->exists) {
            $this->setUniqueSlug($value, '');
        }*/
    }

    /**
     * Recursive routine to set a unique slug
     *
     * @param string $title
     * @param mixed $extra
     */



   /* protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }*/





    /**
     * Set the HTML content automatically when the raw content is set
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
//        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
//        $this->attributes['content_html'] = $markdown->toHTML($value);
    }

    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );
            return;
        }

        $this->tags()->detach();
    }


    /**
     * Return the date portion of published_at
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('M-j-Y');
    }

    /**
     * Return the time portion of published_at
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
     * Alias for content_raw
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }



}
