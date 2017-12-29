<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteLog extends Model
{
    // Declared since the default table name (in plural) has been changed
    protected $table = 'quote_log';
}
