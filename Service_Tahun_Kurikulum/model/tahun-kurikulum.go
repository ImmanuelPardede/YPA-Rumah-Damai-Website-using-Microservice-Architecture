package model

import (
	"gorm.io/gorm"
)

type TahunKurikulum struct {
	gorm.Model
	TahunKurikulum int `gorm:"type:int" json:"tahun_kurikulum"`
}
