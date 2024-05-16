package model

import (
	"gorm.io/gorm"
)

type JenisPekerjaan struct {
	gorm.Model
	JenisPekerjaan string `gorm:"type:varchar(255)" json:"jenis_pekerjaan"`
}
