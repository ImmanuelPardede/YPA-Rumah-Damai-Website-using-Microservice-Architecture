package dto

type TahunAjaranUpdateDTO struct {
	ID          uint   `json:"id" form:"id"`
	TahunAjaran int `json:"tahun_ajaran" form:"tahun_ajaran" binding:"required"`
}

type TahunAjaranCreateDTO struct {
	TahunAjaran int `json:"tahun_ajaran" form:"tahun_ajaran" binding:"required"`
}
