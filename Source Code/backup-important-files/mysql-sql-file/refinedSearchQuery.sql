select u.name, v.alamat, j.judul, j.deskripsi, j.upah_max, j.upah_min
from job j
join users u on j.freelancer_info_id = u.id
join user_info v on u.id = v.user_id
join job_category jc on j.id = jc.job_id
join category c on c.id = jc.category_id
where j.judul like '%%'
and v.alamat like '%%'
and j.upah_max <= 999999999
and j.upah_min >= 0
and c.kategori like '%%'
order by u.