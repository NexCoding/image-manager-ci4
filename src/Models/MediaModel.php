<?php

declare(strict_types=1);

namespace NexCoding\ImageManagerCi4\Models;

use CodeIgniter\Model;

class MediaModel extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'm_id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $createdField = 'm_created_at';
    protected $updatedField = 'm_updated_at';
    protected $protectFields    = false;
    protected $allowedFields = [];
    protected $returnType = 'object';

    public function getImages($start, $limit)
    {
        return $this->orderBy('m_id', 'asc')
            ->limit($limit, $start)
            ->get()
            ->getResultArray();
    }

}