<?php
class Dashboard_model extends Ci_Model{
	
	function laporanTahunan()
	{
		
		$bc = $this->db->query("
		
		select
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=1)AND (YEAR(tgl)=2014))),0) AS `Januari`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=2)AND (YEAR(tgl)=2014))),0) AS `Februari`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=3)AND (YEAR(tgl)=2014))),0) AS `Maret`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=4)AND (YEAR(tgl)=2014))),0) AS `April`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=5)AND (YEAR(tgl)=2014))),0) AS `Mei`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=6)AND (YEAR(tgl)=2014))),0) AS `Juni`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=7)AND (YEAR(tgl)=2014))),0) AS `Juli`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=8)AND (YEAR(tgl)=2014))),0) AS `Agustus`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=9)AND (YEAR(tgl)=2014))),0) AS `September`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=10)AND (YEAR(tgl)=2014))),0) AS `Oktober`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=11)AND (YEAR(tgl)=2014))),0) AS `November`,
		ifnull((SELECT sum(jumlah)	FROM	(pendapatan)WHERE((Month(tgl)=12)AND (YEAR(tgl)=2014))),0) AS `Desember`
	from pendapatan GROUP BY YEAR(tgl) 
		
		
		");
		
		return $bc;
		
	}
	function laporanBiaya()
	{
		
        $tgl = date('Y');
	$bc = $this->db->query("
                select 
                ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=1) and (year(tsubkegiatans.tgl_pergi) =$tgl))),0) as 'Januari',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=2) and (year(tsubkegiatans.tgl_pergi) =$tgl))),0) as 'Februari',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=3) and (year(tsubkegiatans.tgl_pergi) = $tgl))),0) as 'Maret',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=4) and (year(tsubkegiatans.tgl_pergi) = $tgl))),0) as 'April',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=5) and (year(tsubkegiatans.tgl_pergi) = $tgl))),0) as 'Mei',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=6) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'Juni',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=7) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'Juli',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=8) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'Agustus',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=9) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'September',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=10) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'Oktober',
                ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=11) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'November',
                 ifnull ((select sum(totalbiaya) FROM (terencanabiaya) INNER JOIN (tsubkegiatans)
                on (tsubkegiatans.id = terencanabiaya.subkegiatans_id) WHERE 
                ((month(tsubkegiatans.tgl_pergi)=12) and (year(tsubkegiatans.tgl_pergi) =  $tgl))),0) as 'Desember',
                    sum(totalbiaya) as biaya
		
		from terencanabiaya inner join tsubkegiatans on tsubkegiatans.id = terencanabiaya.subkegiatans_id GROUP BY YEAR(tsubkegiatans.tgl_pergi) 
		
		
		");
	
          return $bc;
		
		
	}
	

      public function totals(){
      $tgl = date('Y');
    
  $totals = $this->db->query("select sum(totalbiaya) as totbi FROM terencanabiaya INNER JOIN tsubkegiatans
                on tsubkegiatans.id = terencanabiaya.subkegiatans_id WHERE 
                year(tsubkegiatans.tgl_pergi) =$tgl");
      
      return $totals;
      
      }
/*
 * select tsatker.satker as namasatker, sum(terencanabiaya.totalbiaya) as total from terencanabiaya inner join tsubkegiatans on tsubkegiatans.id = terencanabiaya.subkegiatans_id inner join tsatker on tsatker.idsatker = tsubkegiatans.satker_id group by tsatker.idsatker
 */
        
        public function totalbiayapersatker(){
           

	  $this->db->select('tsatker.satker as satker,sum(terencanabiaya.totalbiaya) as total');
          $this->db->from('terencanabiaya');
          $this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
          $this->db->join('tsatker','tsatker.idsatker = tsubkegiatans.satker_id');
          $this->db->group_by('tsatker.idsatker');
          $totalsatker = $this->db->get();
          return $totalsatker->result();
    
            
        }
        }

