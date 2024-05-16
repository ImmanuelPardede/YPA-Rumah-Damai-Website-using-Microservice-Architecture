package dto

type JenisPenyakitUpdateDTO struct {
	ID            uint   `json:"id" form:"id"`
	JenisPenyakit string `json:"jenis_penyakit" form:"jenis_penyakit" binding:"required,min=3,max=255"`
	Deskripsi     string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}

type JenisPenyakitCreateDTO struct {
	JenisPenyakit string `json:"jenis_penyakit" form:"jenis_penyakit" binding:"required,min=3,max=255"`
	Deskripsi     string `json:"deskripsi" form:"deskripsi" binding:"required,min=3,max=255"`
}
