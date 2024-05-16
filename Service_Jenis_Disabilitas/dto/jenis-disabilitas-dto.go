package dto

type JenisDisabilitasUpdateDTO struct {
	ID                  uint   `json:"id" form:"id"`
	KategoriDisabilitas string `json:"kategori_disabilitas" form:"kategori_disabilitas" binding:"required,min=1,max=255"`
	JenisDisabilitas    string `json:"jenis_disabilitas" form:"jenis_disabilitas" binding:"required,min=1,max=255"`
	Deskripsi           string `json:"deskripsi" form:"deskripsi" binding:"required,min=1,max=255"`
}

type JenisDisabilitasCreateDTO struct {
	KategoriDisabilitas string `json:"kategori_disabilitas" form:"kategori_disabilitas" binding:"required,min=3,max=255"`
	JenisDisabilitas    string `json:"jenis_disabilitas" form:"jenis_disabilitas" binding:"required,min=3,max=255"`
	Deskripsi           string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}
