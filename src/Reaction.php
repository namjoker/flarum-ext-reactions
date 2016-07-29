<?php

namespace Datitisev\Reactions;

use Flarum\Core\Discussion;
use Flarum\Core\Permission;
use Flarum\Core\Support\ScopeVisibilityTrait;
use Flarum\Core\User;
use Flarum\Database\AbstractModel;

class Reaction extends AbstractModel
{
    use ScopeVisibilityTrait;

    /**
     * @{inheritdoc}
     */
    protected $table = 'reactions';

    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Create a new reaction.
     *
     * @param string $userId
     * @param string $postId
     * @param string $reaction
     * @return static
     */
    public static function build($userId, $postId, $reaction)
    {
        $reaction = new static;

        $reaction->userId = $userId;
        $reaction->postId = $postId;
        $reaction->reaction = $reaction;

        return $reaction;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('Flarum\Core\Post', 'post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Flarum\Core\User', 'user_id');
    }

}
