select freelancer_info_id, judul, deskripsi, upah_max, upah_min, name, alamat
from
	/*
	c adalah table yang berisi informasi tentang job dengan judul yang mengandung kata pada input
	*/
	(select j.freelancer_info_id, j.judul, j.deskripsi, j.upah_max, j.upah_min 
	from job j 
	where judul like '%web%') as c
join
	/*
	d adalah table yang berisi informasi tentang id, nama, dan alamat dari freelancer yang bersesuaian
	*/
	(select id, name, alamat 
	from
		(select id, name
		from users u
		where u.id in
		(select freelancer_info_id from job where judul like '%web%')) as a
	join 
		(select u.user_id, u.alamat
		from user_info u
		where u.user_id in
		(select freelancer_info_id from job where judul like '%web%')) as b
	on a.id = b.user_id) as d
on c.freelancer_info_id = d.id