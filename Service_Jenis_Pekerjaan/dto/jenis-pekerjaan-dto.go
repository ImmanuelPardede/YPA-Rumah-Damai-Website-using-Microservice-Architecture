package dto

type JenisPekerjaanUpdateDTO struct {
	ID           uint   `json:"id" form:"id"`
	JenisPekerjaan string `json:"jenis_pekerjaan" form:"jenis_pekerjaan" binding:"required,min=1,max=255"`
}

type JenisPekerjaanCreateDTO struct {
	JenisPekerjaan string `json:"jenis_pekerjaan" form:"jenis_pekerjaan" binding:"required,min=1,max=255"`
}
