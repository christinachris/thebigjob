<?php
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property boolean $published
 * @property FrozenTime $created
 * @property FrozenTime $modified
 */
class Article extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'body' => true,
        'published' => true,
        'archived' => true,
        'created' => true,
        'modified' => true,
        'id' => false,
        'slug' => false,
    ];


    //access the formatted tags for an entity,
    protected function _getTagString()
    {
        if (isset($this->_properties['tag_string'])) {
            return $this->_properties['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');

        return trim($str, ', ');
    }

//Not sure what this function contributes, for the moment, it's being archived

    protected function _setBody($unsafeBodyWithHtml)
    {
        $config = HTMLPurifier_Config::createDefault();

        // Allow iframes from trusted sources (YouTube + Vimeo). Typically embedding iframes is not ideal, because
        // someone could, e.g. embed an iframe to their website which tries to trick the user into paying them money.
        // However, it is quite common to want to embed videos into websites via iframes. This is how YouTube and
        // Vimeo let you embed their videos into other peoples websites.
        // See https://stackoverflow.com/a/12784081 for where this solution came from:
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%');

        $purifier = new HTMLPurifier($config);

        return $purifier->purify($unsafeBodyWithHtml);

    }
}