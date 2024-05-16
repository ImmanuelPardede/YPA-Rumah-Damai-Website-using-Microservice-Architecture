package dto

type JenisPendidikanUpdateDTO struct {
	ID              uint   `json:"id" form:"id"`
	JenisPendidikan string `json:"jenis_pendidikan" form:"jenis_pendidikan" binding:"required,min=1,max=255"`
}

type JenisPendidikanCreateDTO struct {
	JenisPendidikan string `json:"jenis_pendidikan" form:"jenis_pendidikan" binding:"required,min=1,max=255"`
}
