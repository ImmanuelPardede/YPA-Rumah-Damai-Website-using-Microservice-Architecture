package dto

type TahunKurikulumUpdateDTO struct {
	ID             uint `json:"id" form:"id"`
	TahunKurikulum int  `json:"tahun_kurikulum" form:"tahun_kurikulum" binding:"required"`
}

type TahunKurikulumCreateDTO struct {
	TahunKurikulum int `json:"tahun_kurikulum" form:"tahun_kurikulum" binding:"required"`
}
