select u.name, v.alamat, j.judul, j.deskripsi, j.upah_max, j.upah_min
from job j
join users u on j.freelancer_info_id = u.id
join user_info v on u.id = v.user_id
order by j.id 