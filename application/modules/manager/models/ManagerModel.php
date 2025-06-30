<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ManagerModel extends CI_Model
{

	public function get_summary()
	{
		$rst = "WITH RECURSIVE DateRange AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM DateRange WHERE tgl > CURRENT_DATE ( ) - INTERVAL 27 DAY ) SELECT
		d.tgl,
		IFNULL( c.outC, 0 ) AS CuttingToLine,
		IFNULL( m.assb, 0 ) AS MoldToAssembly,
		IFNULL( s.outC, 0 ) AS Sewing,
		IFNULL( p.outC, 0 ) AS FinishGood,
		IFNULL( i.qty, 0) AS Packing
		FROM
			DateRange d
			LEFT JOIN (
			SELECT
				c.tgl,
				SUM( c.qty_pcs ) AS outC 
			FROM
				input_sewing c 
			WHERE
				c.tgl BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
				AND CURRENT_DATE ( ) 
			GROUP BY
				c.tgl 
			) c ON c.tgl = d.tgl
			LEFT JOIN (
			SELECT
				p.tgl,
				p.assb AS assb 
			FROM
				(
				SELECT DATE
					( om.tgl ) AS tgl,
					Sum( omd.qty_outermold ) AS outr,
					Sum( omd.qty_midmold ) AS mid,
					Sum( omd.qty_linningmold ) AS linn,
					COALESCE ( Sum( omd.qty_outermold ), 0 ) + COALESCE ( Sum( omd.qty_midmold ), 0 ) + COALESCE ( Sum( omd.qty_linningmold ), 0 ) AS assb 
				FROM
					output_molding AS om
					INNER JOIN output_molding_detail AS omd ON omd.id_output_molding = om.id_output_molding 
				WHERE
					DATE ( om.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
					AND CURRENT_DATE ( ) 
				GROUP BY
					DATE ( om.tgl ) 
				) AS p 
			) m ON m.tgl = d.tgl
			LEFT JOIN (
			SELECT
				s.tgl_ass AS tgl,
				SUM( s.qty ) AS outC 
			FROM
				output_sewing_detail s 
			WHERE
				s.tgl_ass BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
				AND CURRENT_DATE ( ) 
			GROUP BY
				tgl 
			) s ON s.tgl = d.tgl
			LEFT JOIN (
			SELECT DATE
				( p.tgl_in ) AS tgl,
				SUM( p.qty_box ) AS outC 
			FROM
				transfer_area p 
			WHERE
				DATE ( p.tgl_in ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
				AND CURRENT_DATE ( ) 
			GROUP BY
				DATE ( tgl_in ) 
			) p ON p.tgl = d.tgl
			LEFT JOIN (
			SELECT
				t1.style,
				t1.orc,
				SUM( t1.actual_qty ) qty,
				t1.tgl 
			FROM
				input_packing t1 
			WHERE
				DATE ( t1.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
				AND CURRENT_DATE ( ) 
			GROUP BY
			DATE ( t1.tgl )) i ON DATE(i.tgl) = d.tgl 
		ORDER BY
			d.tgl ASC";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_summary_cutting()
	{
		$rst = "SELECT
			SUM( c.qty_pcs ) sum 
		FROM
			input_sewing c 
		WHERE
			c.tgl BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
			AND CURRENT_DATE ( ) ";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_summary_fg()
	{
		$rst = "SELECT
			SUM( p.qty_box ) sum 
		FROM
			transfer_area p 
		WHERE
			DATE ( p.tgl_in ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
			AND CURRENT_DATE ( );";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_summary_packing()
	{
		$rst = "SELECT
			SUM(t1.actual_qty) sum
		FROM
			input_packing t1 
		WHERE
			DATE ( t1.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
			AND CURRENT_DATE ( );";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_summary_moulding()
	{
		$rst = "WITH RECURSIVE tableMin AS (
			WITH RECURSIVE outMold AS (
				SELECT
					output_molding.orc,
					SUM( output_molding_detail.qty_outermold ) outermold,
					SUM( output_molding_detail.qty_midmold ) midmold,
					SUM( output_molding_detail.qty_linningmold ) linningmold 
				FROM
					output_molding
					INNER JOIN output_molding_detail ON output_molding.id_output_molding = output_molding_detail.id_output_molding 
				WHERE
					DATE ( output_molding.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 27 DAY ) 
					AND CURRENT_DATE ( ) 
				GROUP BY
					output_molding.orc 
				) SELECT
				LEAST(
					IFNULL( outermold, 99999 ),
					IFNULL( midmold, 99999 ),
				IFNULL( linningmold, 99999 )) minOut 
			FROM
				outMold 
			) SELECT
			SUM( t1.minOut ) sum 
		FROM
			tableMin t1";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_by_daterange()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
					iis.tgl,
					iis.orc,
					iis.style,
					iis.color,
					Sum( iis.qty_pcs ) AS qty_cutting
				FROM
					input_sewing iis
					
				WHERE
				iis.tgl >= '$datefrom' AND iis.tgl <= '$dateto'
				GROUP BY
					iis.tgl,
					iis.style,
					iis.orc ";

		$query = $this->db->query($rst);
		return $query->result();
	}


	public function get_data_summary()
	{

		$rst = "SELECT
				input_cutting.orc,
				input_cutting.style,
				input_cutting.color,
				`order`.comm,
				`order`.buyer,
				`order`.so,
				`order`.etd,
				`order`.plan_export,
				`order`.qty AS qty_order,
				sum( input_cutting.qty_pcs ) AS in_trim,
				COALESCE ( out_c.qt_out, 0 ) AS out_trim,
				COALESCE (sew_ot.qty_sew, 0) AS qty_sewing,
				sum( input_cutting.qty_pcs ) - COALESCE ( out_c.qt_out, 0 ) AS stok_trim,
				`order`.qty - sum( input_cutting.qty_pcs ) AS bal_to_cut,
				`order`.qty - COALESCE ( out_c.qt_out, 0 ) AS bal_cut,
				COALESCE ( out_c.qt_out, 0 ) - COALESCE (sew_ot.qty_sew, 0) AS wip_sewing,
				`order`.qty - COALESCE (sew_ot.qty_sew, 0) AS bal_sewing  
			FROM
				input_cutting
				LEFT JOIN `order` ON input_cutting.orc = `order`.orc
				LEFT JOIN ( SELECT input_sewing.orc, SUM( input_sewing.qty_pcs ) AS qt_out FROM input_sewing GROUP BY input_sewing.orc ) out_c ON out_c.orc = input_cutting.orc
				LEFT JOIN ( SELECT SUM( output_sewing_detail.qty ) AS qty_sew, output_sewing_detail.orc FROM output_sewing_detail GROUP BY output_sewing_detail.orc ) AS sew_ot ON sew_ot.orc = input_cutting.orc 
		 
			GROUP BY
				input_cutting.orc";

		$query = $this->db->query($rst);

		return $query->result();
	}

	public function get_data_summary_new($orc)
	{

		$rst = "SELECT
					`order`.orc,
					`order`.style,
					`order`.color,
					`order`.buyer,
					`order`.etd,
					`order`.so,
					`order`.qty AS qty_order,
					ins.qty AS out_trim,
					ots.sew_out AS qty_sewing,
					inc.in_cut AS in_trim,
					COALESCE ( ins.qty, 0 ) - COALESCE ( ots.sew_out, 0 ) AS wip_sewing,
					`order`.qty - COALESCE ( ots.sew_out, 0 ) AS bal_sewing,
					COALESCE ( inc.in_cut, 0 ) - COALESCE ( ins.qty, 0 ) AS stok_trim,
					`order`.qty - COALESCE ( inc.in_cut, 0 ) AS bal_to_cut,
					`order`.qty - COALESCE ( ins.qty, 0 ) AS bal_cut 
				FROM
					`order`
					LEFT JOIN ( SELECT input_sewing.orc, SUM( input_sewing.qty_pcs ) AS qty FROM input_sewing WHERE input_sewing.orc = '$orc' GROUP BY input_sewing.orc ) AS ins ON ins.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS sew_out FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.orc ) AS ots ON ots.orc = `order`.orc
					LEFT JOIN ( SELECT input_cutting.orc, SUM( input_cutting.qty_pcs ) AS in_cut FROM input_cutting WHERE input_cutting.orc = '$orc' GROUP BY input_cutting.orc ) AS inc ON inc.orc = `order`.orc 
				WHERE
					`order`.orc = '$orc'";

		$query = $this->db->query($rst);

		return $query->result();
	}

	public function get_all_wip()
	{

		$rst = "SELECT
					tab1.orc,
					tab1.style,
					tab1.color,
					tab1.in_cutting,
					tab1.in_sewing,
					tab1.balance_cutting_ex 
				FROM
					(
					SELECT
						input_cutting.orc AS orc,
						input_cutting.style AS style,
						input_cutting.color AS color,
						Sum( input_cutting.qty_pcs ) AS in_cutting,
						Sum( input_sewing.qty_pcs ) AS in_sewing,
						sum( `input_cutting`.`qty_pcs` ) - COALESCE ( sum( `input_sewing`.`qty_pcs` ), 0 ) AS balance_cutting_ex 
					FROM
						input_cutting
						LEFT JOIN input_sewing ON input_sewing.kode_barcode = input_cutting.kode_barcode -- WHERE
						
					GROUP BY
						input_cutting.orc 
					) AS tab1 
				WHERE
					tab1.balance_cutting_ex != 0";
		$query = $this->db->query($rst);
		return $query->result();
	}
	public function get_detail_wip($id)
	{
		$sql = " SELECT
					`input_cutting`.`orc` AS `orc`,
					`input_cutting`.`style` AS `style`,
					`input_cutting`.`color` AS `color`,
					`input_cutting`.`size` AS `size`,
					`input_cutting`.`qty_pcs` AS `qty_pcs`,
					`input_cutting`.`kode_barcode` AS `kodebarcodetrims`,
					`input_sewing`.`kode_barcode` AS `kodetosewing`,
					`order`.`buyer` AS `buyer` 
				FROM
					(
						( `input_cutting` LEFT JOIN `input_sewing` ON ( `input_cutting`.`kode_barcode` = `input_sewing`.`kode_barcode` ) )
						JOIN `order` ON ( `order`.`orc` = `input_cutting`.`orc` ) 
					) 
				WHERE
					`input_sewing`.`kode_barcode` IS NULL and`input_cutting`.`orc` = '$id' ";
		$query = $this->db->query($sql);
		// print_r($sql); die();
		return $query->result();
		// var_dump($sql);
		// die;

	}

	public function get_graph()
	{
		$rst = "SELECT
					si.tgl,
					si.orc,
					si.style,
					si.color,
					SUM( si.qty_pcs ) AS outCut 
				FROM
					input_sewing si 
				WHERE
					si.orc IS NOT NULL 
					AND si.tgl = CURRENT_DATE ( ) 
				GROUP BY
					si.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getData()
	{
		$rst = "SELECT
					si.tgl,
					si.orc,
					si.style,
					si.color,
					SUM( si.qty_pcs ) AS outCut 
				FROM
					input_sewing si 
				WHERE
					si.orc IS NOT NULL 
					AND si.tgl = CURRENT_DATE ( ) 
				GROUP BY
					si.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_orc($orc)
	{
		$rst = "SELECT
					si.tgl,
					si.orc,
					si.style,
					si.color,
					si.size,
					SUM( si.qty_pcs ) AS outCut 
				FROM
					input_sewing si 
				WHERE
					si.orc IS NOT NULL 
					AND si.tgl = CURRENT_DATE ( ) 
					AND si.orc = '$orc' 
				GROUP BY
					si.size";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_size($orc, $size)
	{
		$rst = "SELECT
					`is`.orc,
					SUM( `is`.qty_pcs ) AS cuttingOut,
					`is`.kode_barcode 
				FROM
					input_sewing `is` 
				WHERE
					`is`.orc = '$orc' 
					AND `is`.tgl = CURRENT_DATE 
					AND `is`.size = '$size' 
				GROUP BY
					`is`.orc,
					`is`.kode_barcode 
				ORDER BY
					`is`.tgl DESC,
					`is`.orc,
					`is`.line";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_summary_cutting_2()
	{
		$rst = "SELECT
					ord.orc,
					ord.style,
					ord.color,
					ord.buyer,
					ord.qty,
					IFNULL( c.inCut, 0 ) AS inCut,
					IFNULL( i.inSew, 0 ) AS outCut,
					IFNULL( c.inCut, 0 ) - IFNULL( i.inSew, 0 ) AS wip,
					ord.qty - IFNULL( i.inSew, 0 ) AS balance 
				FROM
					(
					SELECT
						c.orc,
						c.style,
						c.color,
						c.buyer,
						c.qty 
					FROM
						cutting c 
					GROUP BY
						c.orc 
					) AS ord
					LEFT JOIN ( SELECT ic.orc, SUM( ic.qty_pcs ) AS inCut FROM input_cutting ic GROUP BY ic.orc ) AS c ON c.orc = ord.orc
					LEFT JOIN ( SELECT si.orc, SUM( si.qty_pcs ) AS inSew FROM input_sewing si GROUP BY si.orc ) AS i ON ord.orc = i.orc 
				WHERE
					ord.orc IS NOT NULL 
					AND ( ord.qty - IFNULL( i.inSew, 0 ) ) > 0 
				GROUP BY
					ord.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_sum_cutting($orc)
	{
		$rst = "SELECT
					ord.orc,
					ord.style,
					ord.color,
					ord.buyer,
					c.size,
					ord.qty AS `order`,
					IFNULL( c.inCut, 0 ) AS inCut,
					IFNULL( i.outCut, 0 ) AS outCut,
					IFNULL( c.inCut, 0 ) - IFNULL( i.outCut, 0 ) AS WIP,
					ord.qty - IFNULL( i.outCut, 0 ) AS Balance 
				FROM
					(
					SELECT
						c.orc,
						c.style,
						c.color,
						c.buyer,
						cd.size,
						SUM( cd.qty_pcs ) AS qty 
					FROM
						cutting c,
						cutting_detail cd 
					WHERE
						c.id_cutting = cd.id_cutting 
					GROUP BY
						cd.size,
						c.orc 
					) AS ord
					LEFT JOIN (
					SELECT
						ic.orc,
						ic.size,
						SUM( ic.qty_pcs ) AS inCut 
					FROM
						input_cutting ic 
					GROUP BY
						ic.size,
						ic.orc 
					) AS c ON c.orc = ord.orc 
					AND ord.size = c.size
					LEFT JOIN (
					SELECT
						si.tgl,
						si.orc,
						si.style,
						si.color,
						si.size,
						SUM( si.qty_pcs ) AS outCut 
					FROM
						input_sewing si 
					WHERE
						si.orc IS NOT NULL 
					GROUP BY
						si.size,
						si.orc 
					) AS i ON ord.orc = i.orc 
					AND ord.size = i.size 
				WHERE
					ord.orc IS NOT NULL 
					AND c.orc = '$orc' 
				GROUP BY
					c.size,
					c.orc 
				ORDER BY
					outCut DESC";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_total_today()
	{
		$rst = "SELECT
					o.tgl,
					SUM( o.o ) AS qtyOut
				FROM
					(
					SELECT
						si.tgl,
						si.orc,
						si.size,
						SUM( si.qty_pcs ) AS o 
					FROM
						input_sewing si 
					WHERE
						si.tgl = CURRENT_DATE ( ) 
					GROUP BY
						si.tgl,
						si.orc,
						si.size 
					) AS o 
				GROUP BY
					o.tgl";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_cutting_size()
	{
		$data = $_POST['data'];
		$tgl = $data['tgl'];
		$rst = "SELECT
					input_sewing.line,
					input_sewing.tgl,
					input_sewing.orc,
					input_sewing.style,
					input_sewing.size,
					SUM( input_sewing.qty_pcs ) AS qt,
					line.description 
				FROM
					input_sewing
					LEFT JOIN line ON input_sewing.line = line.`name` 
				WHERE
					input_sewing.tgl = '$tgl' 
				GROUP BY
					input_sewing.line,
					input_sewing.tgl,
					input_sewing.orc,
					input_sewing.size 
				ORDER BY
					line.description ASC ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function daily_molding()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
						tab1.tgl,
						tab1.orc,
						tab1.qtyin_outer,
						tab1.qtyin_mid,
						tab1.qtyin_linning,
						tab2.out_outermold,
						tab2.out_midmold,
						tab2.out_linningmold 
					FROM
						(
						SELECT
							moldin.tgl,
							moldin.orc,
							SUM( moldin.qtyin_outer ) AS qtyin_outer,
							SUM( moldin.qtyin_mid ) AS qtyin_mid,
							SUM( moldin.qtyin_linning ) AS qtyin_linning 
						FROM
							(
							SELECT
								input_molding.tgl,
								input_molding.orc AS orc,
								input_molding.style AS style,
							IF
								( ( `input_molding_detail`.`outermold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_outer,
							IF
								( ( `input_molding_detail`.`midmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_mid,
							IF
								( ( `input_molding_detail`.`linningmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_linning 
							FROM
								( input_molding JOIN input_molding_detail ON ( ( input_molding_detail.id_input_molding = input_molding.id_input_molding ) ) ) 
							) AS moldin 
						GROUP BY
							moldin.tgl,
							moldin.orc 
						) AS tab1
						LEFT JOIN (
						SELECT
							DATE( output_molding.tgl ) AS tgl,
							output_molding.orc AS orc,
							Sum( output_molding_detail.qty_outermold ) AS out_outermold,
							Sum( output_molding_detail.qty_midmold ) AS out_midmold,
							Sum( output_molding_detail.qty_linningmold ) AS out_linningmold 
						FROM
							output_molding
							JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
						GROUP BY
							DATE( output_molding.tgl ),
							output_molding.orc 
						) AS tab2 ON tab1.orc = tab2.orc 
						AND tab1.tgl = tab2.tgl 
					WHERE
						date( tab1.tgl ) >= '$datefrom' 
						AND date( tab1.tgl ) <= '$dateto'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function daterange_in_daily()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
					input_cutting.orc,
					input_cutting.style,
					input_cutting.color,
					input_cutting.size,
					SUM( input_cutting.qty_pcs ) AS qty,
					input_cutting.tgl 
				FROM
					input_cutting 
				WHERE
					input_cutting.tgl >= '$datefrom' 
					AND input_cutting.tgl <= '$dateto' 
				GROUP BY
					input_cutting.orc,
					input_cutting.size,
					input_cutting.tgl ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_summaries_in($orc)
	{
		$rst = "SELECT
					input_cutting.orc,
					input_cutting.tgl,
					input_cutting.style,
					input_cutting.color,
					input_cutting.no_bundle,
					input_cutting.size,
					input_cutting.qty_pcs 
				FROM
					input_cutting 
				WHERE
					input_cutting.orc = '$orc' 
				ORDER BY
					input_cutting.no_bundle ASC 
				";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_cut($orc, $tgl)
	{
		$rst = "SELECT
					input_sewing.line,
					input_sewing.tgl,
					input_sewing.orc,
					input_sewing.style,
					input_sewing.color,
					input_sewing.no_bundle,
					input_sewing.size,
					input_sewing.qty_pcs 
				FROM
					input_sewing 
				WHERE
					input_sewing.orc = '$orc' 
					AND input_sewing.tgl = '$tgl'
				";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_summaries_out($orc)
	{
		$rst = "SELECT
					input_sewing.tgl,
					input_sewing.orc,
					input_sewing.style,
					input_sewing.color,
					input_sewing.no_bundle,
					input_sewing.size,
					input_sewing.qty_pcs 
				FROM
					input_sewing 
				WHERE
					input_sewing.orc = '$orc' 
				ORDER BY
					input_sewing.no_bundle ASC 
				";
		$query = $this->db->query($rst);
		return $query->result();
	}
	public function get_all_orc_molding()
	{
		$this->db->select('DISTINCT(orc)');
		$query = $this->db->get('v_molding_orc');

		return $query->result();
	}

	public function get_detail_molding2($orc)
	{
		$rst = $this->db->get_where('v_molding_orc', array('orc' => $orc));
		return $rst->result();
	}

	public function get_by_orc_molding($orc)
	{

		$rst = "SELECT
					input_cutting.orc AS `orc`,
					input_cutting.style AS style,
					input_cutting.color AS color,
					`order`.qty AS `order`,
					`order`.etd AS etd,
					`order`.exported_date AS exported_date,
					`order`.buyer AS buyer,
					`order`.`status` AS `status`,
				IF
					( ( `order`.`exported_date` IS NULL ), ( `order`.`qty` - sum( `input_cutting`.`qty_pcs` ) ), 0 ) AS balance_order_ex,
					Sum( input_cutting.qty_pcs ) AS in_cutting,
					Sum( input_sewing.qty_pcs ) AS in_sewing,
					Sum( input_cutting.qty_pcs ) - Sum( input_sewing.qty_pcs ) AS wip_cut,
				IF
					(
						( `order`.`exported_date` IS NULL ),
						( sum( `input_cutting`.`qty_pcs` ) - COALESCE ( sum( `input_sewing`.`qty_pcs` ), 0 ) ),
						0 
					) AS balance_cutting_ex,
					`order`.plan_export AS plan_export,
					`order`.so AS so,
					sewingOrc.out_sewing AS qty_sewing_out,
					outputMolding.qty_mold,
					inputMolding.in_molding,
					Sum( input_sewing.qty_pcs ) - sewingOrc.out_sewing AS wip_sewing,
					`order`.qty - sewingOrc.out_sewing AS balance_order_sewing,
					inputMolding.in_molding - outputMolding.qty_mold AS wip_molding,
					`order`.qty - outputMolding.qty_mold AS balance_mold,
					packing.in_packing,
					packing.qty_packing,
					packing.wip_pac,
					`order`.qty - packing.qty_packing AS bal_packing 
				FROM
					(
						( input_cutting LEFT JOIN `order` ON ( ( `order`.orc = input_cutting.orc ) ) )
						LEFT JOIN input_sewing ON ( ( input_sewing.kode_barcode = input_cutting.kode_barcode ) ) 
					)
					LEFT JOIN (
					SELECT
						output_sewing_detail.orc AS orc,
						Sum( output_sewing_detail.qty ) AS out_sewing,
						Sum( IF ( `output_sewing_detail`.`assembly` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS qty_sewing 
					FROM
						( ( ( output_sewing JOIN output_sewing_detail ON ( output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing ) ) ) ) 
					WHERE
						output_sewing_detail.orc = '$orc' 
					GROUP BY
						output_sewing_detail.orc 
					) AS sewingOrc ON input_cutting.orc = sewingOrc.orc
					LEFT JOIN (
					SELECT
						output_molding.orc AS orc,
						(
						CASE
								
								WHEN ( ( sum( `output_molding_detail`.`qty_linningmold` ) IS NULL ) AND ( sum( `output_molding_detail`.`qty_midmold` ) IS NULL ) ) THEN
								sum( `output_molding_detail`.`qty_outermold` ) 
								WHEN ( ( sum( `output_molding_detail`.`qty_midmold` ) IS NULL ) AND ( sum( `output_molding_detail`.`qty_outermold` ) IS NULL ) ) THEN
								sum( `output_molding_detail`.`qty_linningmold` ) 
								WHEN ( ( sum( `output_molding_detail`.`qty_outermold` ) IS NULL ) AND ( sum( `output_molding_detail`.`qty_linningmold` ) IS NULL ) ) THEN
								sum( `output_molding_detail`.`qty_midmold` ) 
								WHEN ( sum( `output_molding_detail`.`qty_linningmold` ) IS NULL ) THEN
								least( sum( `output_molding_detail`.`qty_midmold` ), sum( `output_molding_detail`.`qty_outermold` ) ) 
								WHEN ( sum( `output_molding_detail`.`qty_midmold` ) IS NULL ) THEN
								least( sum( `output_molding_detail`.`qty_linningmold` ), sum( `output_molding_detail`.`qty_outermold` ) ) 
								WHEN ( sum( `output_molding_detail`.`qty_outermold` ) IS NULL ) THEN
								least( sum( `output_molding_detail`.`qty_linningmold` ), sum( `output_molding_detail`.`qty_midmold` ) ) 
							END 
							) AS `qty_mold` 
						FROM
							( ( output_molding JOIN output_molding_detail ON ( ( output_molding_detail.id_output_molding = output_molding.id_output_molding ) ) ) ) 
						WHERE
							output_molding.orc = '$orc' 
						GROUP BY
							output_molding.orc 
						) AS outputMolding ON input_cutting.orc = outputMolding.orc
						LEFT JOIN (
						SELECT 
							input_molding.orc AS orc,
							Sum( input_molding_detail.qty_pcs ) AS in_molding 
						FROM
							( ( input_molding JOIN input_molding_detail ON ( ( input_molding_detail.id_input_molding = input_molding.id_input_molding ) ) ) ) 
						WHERE
							input_molding.orc = '$orc' 
						GROUP BY
							input_molding.orc 
						) AS inputMolding ON input_cutting.orc = inputMolding.orc
						LEFT JOIN (
						SELECT
							op.`orc` AS `orc`,
							ins.qty_packing AS in_packing,
							sum( opd.`qty` ) AS `qty_packing`,
							ins.qty_packing - sum( opd.`qty` ) AS wip_pac 
						FROM
							(
								`output_packing` op
								JOIN `output_packing_detail` opd ON ( opd.`id_output_packing` = op.`id_output_packing` )
								LEFT JOIN ( SELECT input_packing.orc, SUM( input_packing.qty ) AS qty_packing FROM input_packing GROUP BY input_packing.orc ) AS ins ON ins.orc = op.orc 
							) 
						WHERE
							op.orc = '$orc' 
						GROUP BY
							op.`orc` 
						) AS packing ON input_cutting.orc = packing.`orc` 
					WHERE
						input_cutting.orc = '$orc' 
				GROUP BY
					input_cutting.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_daily_molding_orc()
	{

		$data = $_POST['data'];
		$tgl = $data['tgl'];

		$rst = "SELECT
					output_molding_detail.id_output_molding_detail,
					DATE( output_molding.tgl ) AS tgl,
					TIME( output_molding.tgl ) AS wkt,
					output_molding.shift,
					output_molding.orc,
					output_molding.style,
					output_molding.color,
					output_molding_detail.size,
					output_molding_detail.no_bundle,
					output_molding_detail.outermold_barcode,
					output_molding_detail.qty_outermold,
					output_molding_detail.midmold_barcode,
					output_molding_detail.qty_midmold,
					output_molding_detail.linningmold_barcode,
				output_molding_detail.qty_linningmold,
					COALESCE ( output_molding_detail.qty_outermold, 0 ) + COALESCE ( output_molding_detail.qty_midmold, 0 ) + COALESCE ( output_molding_detail.qty_linningmold, 0 ) AS qty_molding 
				FROM
					output_molding
					INNER JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
				WHERE
					DATE( output_molding.tgl ) = '$tgl'
		";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function getDataAllSummary($orc)
	{

		$rst = "SELECT
					`order`.orc,
					`order`.style,
					`order`.color,
					`order`.buyer,
					`order`.etd,
					`order`.qty,
					inmold.qtyin_outer,
					inmold.qtyin_mid,
					inmold.qtyin_linning,
					outmold.out_outermold,
					outmold.out_midmold,
					outmold.out_linningmold,
					`order`.qty - inmold.qtyin_outer - inmold.qtyin_mid - inmold.qtyin_linning AS balance_in,
					`order`.qty - outmold.out_outermold - outmold.out_midmold - outmold.out_linningmold AS balance_out 
				FROM
					`order`
					LEFT JOIN (
					SELECT
						moldin.tgl,
						moldin.orc,
						SUM( moldin.qtyin_outer ) AS qtyin_outer,
						SUM( moldin.qtyin_mid ) AS qtyin_mid,
						SUM( moldin.qtyin_linning ) AS qtyin_linning 
					FROM
						(
						SELECT
							input_molding.tgl,
							input_molding.orc AS orc,
							input_molding.style AS style,
						IF
							( ( `input_molding_detail`.`outermold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_outer,
						IF
							( ( `input_molding_detail`.`midmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_mid,
						IF
							( ( `input_molding_detail`.`linningmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_linning 
						FROM
							( input_molding JOIN input_molding_detail ON ( ( input_molding_detail.id_input_molding = input_molding.id_input_molding ) ) ) 
						) AS moldin 
					WHERE
						moldin.orc = '$orc' 
					GROUP BY
						moldin.orc 
					) AS inmold ON inmold.orc = `order`.orc
					LEFT JOIN (
					SELECT
						DATE( output_molding.tgl ) AS tgl,
						output_molding.orc AS orc,
						COALESCE ( Sum( output_molding_detail.qty_outermold ), 0 ) AS out_outermold,
						COALESCE ( Sum( output_molding_detail.qty_midmold ), 0 ) AS out_midmold,
						COALESCE ( Sum( output_molding_detail.qty_linningmold ), 0 ) AS out_linningmold 
					FROM
						output_molding
						JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
					WHERE
						output_molding.orc = '$orc' 
					GROUP BY
						output_molding.orc 
					) AS outmold ON outmold.orc = `order`.orc 
				WHERE
					`order`.orc = '$orc'
								";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_daily_sewing()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
					`output_sewing_detail`.`tgl_ass` AS `tgl`,
					sum( `output_sewing_detail`.`qty` ) AS `qty`,
					`input_sewing`.`style` AS `style`,
					sum( IF ( `output_sewing_detail`.`tgl_ass` = NULL, '0', `output_sewing_detail`.`qty` ) ) AS `qty_out`,
					`output_sewing_detail`.`orc` AS `orc`,
					output_sewing_detail.size,
					`input_sewing`.`center_panel_sam` + `input_sewing`.`back_wings_sam` + `input_sewing`.`cups_sam` + `input_sewing`.`assembly_sam` AS `sam`,
					`input_sewing`.`color` AS `color` 
				FROM
					(
						( `output_sewing` RIGHT JOIN `output_sewing_detail` ON ( `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` ) )
						LEFT JOIN `input_sewing` ON ( `input_sewing`.`kode_barcode` = `output_sewing_detail`.`kode_barcode` ) 
					) 
					WHERE
								`output_sewing_detail`.`tgl_ass` >= '$datefrom' AND `output_sewing_detail`.`tgl_ass` <= '$dateto'
				GROUP BY
					`output_sewing_detail`.`orc`,
					`output_sewing_detail`.`tgl_ass`,
					output_sewing_detail.size ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataCurrentOutputMolding()
	{

		$rst = "SELECT
					DATE( output_molding.tgl ) AS tgl,
					output_molding.orc,
					output_molding.color,
					output_molding.style,
					output_molding_detail.size,
					IFNULL( SUM( output_molding_detail.qty_outermold ), 0 ) AS out_outermold,
					IFNULL( SUM( output_molding_detail.qty_midmold ), 0 ) AS out_midmold,
					IFNULL( SUM( output_molding_detail.qty_linningmold ), 0 ) AS out_linningmold,
					IFNULL( SUM( output_molding_detail.qty_outermold ), 0 ) + IFNULL( SUM( output_molding_detail.qty_midmold ), 0 ) + IFNULL( SUM( output_molding_detail.qty_linningmold ), 0 ) AS output_assemble 
				FROM
					output_molding
					INNER JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
				WHERE
					DATE( output_molding.tgl ) = CURRENT_DATE () 
				GROUP BY
					DATE( output_molding.tgl ),
					output_molding.orc ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataCurrentTotalOutputMolding()
	{
		$rst = "SELECT
					IFNULL( SUM( output_molding_detail.qty_outermold ), 0 ) AS out_outermold,
					IFNULL( SUM( output_molding_detail.qty_midmold ), 0 ) AS out_midmold,
					IFNULL( SUM( output_molding_detail.qty_linningmold ), 0 ) AS out_linningmold,
					IFNULL( SUM( output_molding_detail.qty_outermold ), 0 ) + IFNULL( SUM( output_molding_detail.qty_midmold ), 0 ) + IFNULL( SUM( output_molding_detail.qty_linningmold ), 0 ) AS output_assemble 
				FROM
					output_molding
					INNER JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
				WHERE
					DATE( output_molding.tgl ) = CURRENT_DATE ()  ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_molding_in()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
					moldin.tgl,
					moldin.orc,
					SUM( moldin.qtyin_outer ) AS qtyin_outer,
					SUM( moldin.qtyin_mid ) AS qtyin_mid,
					SUM( moldin.qtyin_linning ) AS qtyin_linning 
				FROM
					(
					SELECT
						input_molding.tgl,
						input_molding.orc AS orc,
						input_molding.style AS style,
					IF
						( ( `input_molding_detail`.`outermold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_outer,
					IF
						( ( `input_molding_detail`.`midmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_mid,
					IF
						( ( `input_molding_detail`.`linningmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_linning 
					FROM
						( input_molding JOIN input_molding_detail ON ( ( input_molding_detail.id_input_molding = input_molding.id_input_molding ) ) ) 
					) AS moldin 
				WHERE
					moldin.tgl >= '$datefrom' 
					AND moldin.tgl <= '$dateto' 
				GROUP BY
					moldin.orc,
					moldin.tgl ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	function get_data_detail_molding_in()
	{
		$orc = $_POST['orc'];
		$tgl = $_POST['tgl'];
		$sql = "SELECT
					input_molding.tgl,
					input_molding.orc AS `orc`,
					input_molding.style AS style,
					input_molding_detail.size,
					input_molding.color,
					input_molding_detail.no_bundle,
				IF
					( ( `input_molding_detail`.`outermold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_outer,
				IF
					( ( `input_molding_detail`.`midmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_mid,
				IF
					( ( `input_molding_detail`.`linningmold_barcode` IS NOT NULL ), `input_molding_detail`.`qty_pcs`, 0 ) AS qtyin_linning 
				FROM
					( input_molding JOIN input_molding_detail ON ( ( input_molding_detail.id_input_molding = input_molding.id_input_molding ) ) ) 
				WHERE
					input_molding.orc = '$orc'
					AND input_molding.tgl = '$tgl'
        ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_molding_out()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$rst = "SELECT
					DATE( output_molding.tgl ) AS tgl,
					output_molding.orc AS `orc`,
					COALESCE(Sum( output_molding_detail.qty_outermold ),0) AS out_outermold,
					COALESCE(Sum( output_molding_detail.qty_midmold ) ,0)AS out_midmold,
					COALESCE(Sum( output_molding_detail.qty_linningmold ),0) AS out_linningmold 
				FROM
					output_molding
					JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
				WHERE
					DATE( output_molding.tgl ) >= '$datefrom' 
					AND DATE( output_molding.tgl ) <= '$dateto' 
				GROUP BY
					output_molding.orc,
					DATE(
					output_molding.tgl 
					) ";

		$query = $this->db->query($rst);
		return $query->result();
	}

	function get_data_detail_molding_out()
	{
		$orc = $_POST['orc'];
		$tgl = $_POST['tgl'];
		$sql = "SELECT
					DATE( output_molding.tgl ) AS tgl,
					output_molding.orc AS `orc`,
					output_molding_detail.qty_outermold,
					output_molding_detail.qty_midmold,
					output_molding_detail.qty_linningmold,
					output_molding.style, 
					output_molding.color, 
					output_molding_detail.size, 
					output_molding_detail.no_bundle 
				FROM
					output_molding
					JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding 
				WHERE
					DATE( output_molding.tgl ) = '$tgl' 
					AND output_molding.orc = '$orc'
        ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_summary_sewing_orc()
	{

		$rst = "SELECT
					input_sewing.orc,
					input_sewing.style,
					input_sewing.color,
					`order`.comm,
					`order`.buyer,
					`order`.so,
					`order`.color,
					`order`.etd,
					`order`.plan_export,
					`order`.qty,
					SUM( input_sewing.qty_pcs ) AS sew_in,
					COALESCE ( ot_sew.sew_out, 0 ) AS sew_out,
					SUM( input_sewing.qty_pcs ) - COALESCE ( ot_sew.sew_out, 0 ) AS wip,
					`order`.qty - COALESCE ( ot_sew.sew_out, 0 ) AS balance 
				FROM
					input_sewing
					LEFT JOIN `order` ON input_sewing.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS sew_out FROM output_sewing_detail GROUP BY output_sewing_detail.orc ) AS ot_sew ON ot_sew.orc = input_sewing.orc 
				WHERE
					`order`.`status` = 'On Progress' 
				GROUP BY
					input_sewing.orc";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function get_summary_sewing_orc_new($orc)
	{

		$rst = "SELECT
					`order`.orc,
					`order`.style,
					`order`.color,
					`order`.buyer,
					`order`.etd,
					`order`.so,
					`order`.qty,
					ins.qty AS sew_in,
					ots.sew_out,
					COALESCE ( ins.qty, 0 ) - COALESCE ( ots.sew_out, 0 ) AS wip,
					`order`.qty - COALESCE ( ots.sew_out, 0 ) AS balance 
				FROM
					`order`
					LEFT JOIN ( SELECT input_sewing.orc, SUM( input_sewing.qty_pcs ) AS qty FROM input_sewing WHERE input_sewing.orc = '$orc' GROUP BY input_sewing.orc ) AS ins ON ins.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS sew_out FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.orc ) AS ots ON ots.orc = `order`.orc 
				WHERE
					`order`.orc = '$orc'";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function get_sewing_size()
	{
		$data = $_POST['data'];
		$tgl = $data['tgl'];
		$rst = "SELECT
					`order`.`orc`,
					`order`.style,
					`order`.color,
					otd.tgl_ass,
					otd.line,
					otd.size,
					otd.qt,
					otd.id_line,
					otd.description 
				FROM
					`order`
					INNER JOIN (
					SELECT
						output_sewing_detail.tgl_ass,
						output_sewing.line,
						output_sewing_detail.orc,
						output_sewing_detail.size,
						SUM( output_sewing_detail.qty ) AS qt,
						line.id_line,
						line.description 
					FROM
						output_sewing
						INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing
						LEFT JOIN line ON output_sewing.line = line.`name` 
					WHERE
						`output_sewing_detail`.`tgl_ass` = '$tgl' 
					GROUP BY
						output_sewing_detail.tgl_ass,
						output_sewing.line,
						output_sewing_detail.orc,
						output_sewing_detail.size 
					ORDER BY
					line.description ASC 
					) AS otd ON `order`.orc = otd.orc ";

		$query = $this->db->query($rst);
		return $query->result();
	}
	public function sewing_summary_line()
	{

		// $data = $_POST['dataStr'];
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
		dayname( output_sewing_detail.tgl_ass ) AS HR,
		output_sewing_detail.tgl_ass,
		output_sewing.line,
		Sum( output_sewing_detail.qty ) AS qty,
		output_sewing_detail.orc ,
			line.description
	FROM
		output_sewing
		INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
		LEFT JOIN line ON output_sewing.line = line.`name` 
	WHERE
		output_sewing_detail.tgl_ass >= '$datefrom ' AND output_sewing_detail.tgl_ass <= '$dateto'
	GROUP BY
		output_sewing_detail.tgl_ass,
		output_sewing.line ,
		output_sewing_detail.orc 
	ORDER BY
		line.description ASC";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataGraphSewingTodayShift()
	{
		// $this->db->select(
		// 	'line.`name`, line.description, line.shift, output_sewing.style,
		//     SUM(output_sewing_detail.qty) AS output, output_sewing_detail.orc'
		// );
		// $this->db->from('line');
		// $this->db->join('output_sewing', 'line.`name` = output_sewing.line', 'left');
		// $this->db->join('output_sewing_detail', 'output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing', 'left');
		// $this->db->where('output_sewing.tgl', date('Y-m-d'));
		// // $this->db->where('line.shift', $shift);
		// $this->db->group_by('output_sewing.line');
		// $this->db->order_by('line.description');

		// $rst = $this->db->get();

		// return $rst->result();
		$rst = "SELECT
					output_sewing.tgl,
					output_sewing.line,
					line.description,
					output_sewing_detail.tgl_ass,
					SUM( output_sewing_detail.qty ) AS `output` 
				FROM
					output_sewing
					LEFT JOIN line ON output_sewing.line = line.`name`
					LEFT JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
				WHERE
					output_sewing.tgl = CURRENT_DATE 
				GROUP BY
					output_sewing.line 
				ORDER BY
					line.description ASC";
		$query = $this->db->query($rst);
		return $query->result();
		// return $this->db->last_query();
	}

	public function getDataSewingToday()
	{

		$rst = "SELECT
					output_sewing_detail.tgl_ass, 
					SUM(output_sewing_detail.qty) AS qty
				FROM
					output_sewing
					INNER JOIN
					output_sewing_detail
					ON 
						output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing
				WHERE
					output_sewing_detail.tgl_ass = CURRENT_DATE
				GROUP BY
					output_sewing_detail.tgl_ass";
		$query = $this->db->query($rst);
		return $query->result();
		// return $this->db->last_query();
	}

	public function getCountORCTodayShift()
	{
		$this->db->select('line.shift, count(distinct(output_sewing_detail.orc)) as count_orc');
		$this->db->from('line');
		$this->db->join('output_sewing', 'line.`name` = output_sewing.line', 'left');
		$this->db->join('output_sewing_detail', 'output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing', 'left');
		$this->db->where('output_sewing_detail.tgl_ass', date('Y-m-d'));
		// $this->db->where('line.shift', $shift);

		$row = $this->db->get();

		return $row->row();
	}

	public function getTotalDownTimeMachine()
	{
		$this->db->select(
			'  gomekanik.mekanik_repairing.line, 
		    gomekanik.mekanik_repairing.tgl, 
		    SEC_TO_TIME(
		        SUM(
		            TIME_TO_SEC(
		                TIMEDIFF(
		                    gomekanik.mekanik_repairing.date_end_repairing,
		                IF
		                (gomekanik.mekanik_repairing.date_end_repairing = "00:00:00", gomekanik.mekanik_repairing.date_end_repairing, gomekanik.mekanik_repairing.date_start_repairing ))))) AS TotalDownTime '
		);
		$this->db->from('productionreport.line');
		$this->db->join('gomekanik.mekanik_repairing', 'productionreport.line.`name` = gomekanik.mekanik_repairing.line ', 'left');
		// $this->db->where('productionreport.line.shift', $shift);
		$this->db->where('gomekanik.mekanik_repairing.tgl', date('Y-m-d'));
		$rst = $this->db->get();
		return $rst->row();
	}
	public function getDataGraphSewingToday()
	{
		$rst = "SELECT
        l.id_line,
        os.line,
        osd.orc,
        osd.tgl_ass AS tgl,
        SUM( osd.qty ) AS qty 
    FROM
        output_sewing_detail osd,
        output_sewing os,
        line l 
    WHERE
        os.id_output_sewing = osd.id_output_sewing 
        AND l.NAME = os.line 
        AND date( osd.tgl_ass ) = CURRENT_DATE ( ) 
    GROUP BY
        os.line";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_data_today_sewing_new()
	{
		$rst = "SELECT
					output_sewing.line,
					output_sewing_detail.tgl_ass,
					SUM( output_sewing_detail.qty ) AS qty,
					output_sewing_detail.orc 
				FROM
					output_sewing
					INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
				WHERE
					output_sewing_detail.tgl_ass = CURRENT_DATE 
				GROUP BY
					output_sewing.line,
					output_sewing_detail.tgl_ass";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataOrcToday()
	{
		$rst = "SELECT
					COUNT( osd.orc ) AS qty 
				FROM
					(
					SELECT
						output_sewing_detail.tgl_ass,
						output_sewing_detail.orc 
					FROM
						output_sewing
						INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
					WHERE
						output_sewing_detail.tgl_ass = CURRENT_DATE 
					GROUP BY
						output_sewing_detail.tgl_ass,
					output_sewing_detail.orc 
					) AS osd";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataLineToday()
	{
		$rst = "SELECT
					output_sewing.tgl, 
					COUNT(output_sewing.line) as qty
				FROM
					output_sewing
					WHERE
					output_sewing.tgl = CURRENT_DATE";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataDowntimeToday()
	{
		$db3 = $this->load->database('database3', true);
		$rst = "SELECT
					gomekanik.mekanik_repairing.tgl,
					SEC_TO_TIME(
						SUM(
							TIME_TO_SEC(
								TIMEDIFF(
									gomekanik.mekanik_repairing.date_end_repairing,
								IF
								( gomekanik.mekanik_repairing.date_end_repairing = '00:00:00', gomekanik.mekanik_repairing.date_end_repairing, gomekanik.mekanik_repairing.date_start_repairing ))))) AS TotalDownTime 
				FROM
					mekanik_repairing 
				WHERE
					gomekanik.mekanik_repairing.tgl = CURRENT_DATE";
		$query = $db3->query($rst);
		// $query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_today_new($selectedRow)
	{
		$rst = "SELECT
                output_sewing_detail.tgl_ass,
                output_sewing.line,
                output_sewing_detail.orc,
                output_sewing_detail.size,
                SUM( output_sewing_detail.qty ) AS qty,
                line.id_line,
                `order`.style,
                `order`.color,
                line.description 
            FROM
                output_sewing
                INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing
                LEFT JOIN line ON output_sewing.line = line.`name`
                LEFT JOIN `order` ON output_sewing_detail.orc = `order`.orc 
            WHERE
                output_sewing_detail.tgl_ass = CURRENT_DATE 
                AND  output_sewing.line = '$selectedRow' 
            GROUP BY
                output_sewing_detail.tgl_ass,
                output_sewing.line,
                output_sewing_detail.orc,
                output_sewing_detail.size,
                `order`.color 
            ORDER BY
                line.description ASC";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_summaries($orc)
	{
		$rst = "SELECT
					output_sewing_detail.orc,
					output_sewing_detail.tgl_ass,
					output_sewing_detail.qty ,
					output_sewing_detail.no_bundle,
					output_sewing_detail.size
				FROM
					output_sewing_detail 
				WHERE
					output_sewing_detail.orc = '$orc' 
				";
		$query = $this->db->query($rst);
		return $query->result();
	}
	public function get_detail_summaries_sewing_in($orc)
	{
		$rst = "SELECT
					input_sewing.orc, 
					input_sewing.style, 
					input_sewing.color, 
					input_sewing.no_bundle, 
					input_sewing.size, 
					input_sewing.qty_pcs,
					input_sewing.tgl
				FROM
					input_sewing
					WHERE
					input_sewing.orc = '$orc' 
				";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_machine_breakedown($idline)
	{
		$rst = "SELECT
        mb.start_waiting AS time,
        mb.machine_brand,
        mb.machine_type,
        mb.type,
        mb.sympton,
        TIMEDIFF( mb.end_waiting, IF ( mb.end_waiting = '00:00:00', mb.end_waiting, mb.start_waiting ) ) duration,
    IF
        ( mb.end_waiting = '00:00:00', 'Repair', 'Settled' ) AS STATUS 
    FROM
        machine_breakdown mb,
        line l 
    WHERE
        l.NAME = mb.line 
        AND ( date( mb.date_start_waiting ) = CURRENT_DATE ( ) AND date( mb.date_end_waiting ) = CURRENT_DATE ( ) ) 
        AND l.id_line = '$idline'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_data_sum_sewing_coba()
	{
		$rst = "SELECT
					ord.orc,
					ord.style,
					ord.color,
					ord.buyer,
					ord.qty,
					IFNULL( i.inSew, 0 ) AS inSew,
					IFNULL( o.outSew, 0 ) AS outSew,
					IFNULL( i.inSew, 0 ) - IFNULL( o.outSew, 0 ) AS WIP,
					ord.qty - IFNULL( o.outSew, 0 ) AS Balance 
				FROM
					(
					SELECT
						c.orc,
						c.style,
						c.color,
						c.buyer,
						c.qty 
					FROM
						cutting c 
					GROUP BY
						c.orc 
					) AS ord
					LEFT JOIN ( SELECT osd.orc, SUM( osd.qty ) AS outSew FROM output_sewing_detail osd GROUP BY osd.orc ) AS o ON o.orc = ord.orc
					LEFT JOIN ( SELECT si.orc, SUM( si.qty_pcs ) AS inSew FROM input_sewing si GROUP BY si.orc ) AS i ON ord.orc = i.orc 
				WHERE
					ord.orc IS NOT NULL 
					AND ord.qty - IFNULL( o.outSew, 0 ) > 0 
				GROUP BY
					ord.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_summary_sewing($orc)
	{
		$rst = "SELECT
					o.orc,
					o.line,
					o.size,
					i.order_size,
					o.qtyIn,
					o.qtyOutput,
					o.qtyIn - o.qtyOutput AS WIP 
				FROM
					(
					SELECT
						osd.orc,
						os.line,
						`is`.size,
						osd.tgl_ass AS outputDate,
						SUM( `is`.qty_pcs ) AS qtyIn,
						SUM( osd.qty ) AS qtyOutput 
					FROM
						output_sewing_detail osd,
						input_sewing `is`,
						output_sewing os 
					WHERE
						`is`.orc = osd.orc 
						AND `is`.no_bundle = osd.no_bundle 
						AND osd.id_output_sewing = os.id_output_sewing 
						AND osd.orc IS NOT NULL 
					GROUP BY
						osd.orc,
						`is`.size,
						`is`.line 
					) AS o,
					(
					SELECT
						c.orc,
						c.style,
						c.color,
						c.buyer,
						c.qty AS `order`,
						c.boxes,
						cd.size,
						cd.qty AS order_size,
						o.etd,
						o.tgl_to_cutting,
						IFNULL( date( o.plan_export ), 'NOT PLANED' ) AS plan_expr 
					FROM
						cutting c
						LEFT JOIN cutting_detail cd ON c.id_cutting = cd.id_cutting
						LEFT JOIN `order` o ON c.orc = o.orc 
					WHERE
						c.orc IS NOT NULL 
					GROUP BY
						c.orc,
						cd.size 
					ORDER BY
						plan_expr = date( CURRENT_DATE ( ) ) DESC,
						date( CURRENT_DATE ( ) ) < date( plan_expr ) DESC,
						plan_expr ASC 
					) AS i 
				WHERE
					o.orc = i.orc 
					AND o.size = i.size 
					AND o.orc = '$orc' 
				GROUP BY
					o.size,
					o.line";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function daterange_packing()
	{
		$data = $_POST['data'];
		$tgl = $data['tgl'];

		$rst = "SELECT
					tab2.dayname,
					tab2.tgl,
					tab2.line,
					tab2.orc,
					tab2.pertama,
					tab2.kedua,
					tab2.ketiga,
					tab2.keempat,
					tab2.kelima,
					tab2.keenam,
					tab2.ketuju,
					tab2.kedelan,
					tab2.kesembilan,
					tab2.kesepuluh,
					tab2.kesebelas,
					tab2.keduabelas,
					tab2.ketigabelas,
					(
						tab2.pertama + tab2.kedua + tab2.ketiga + tab2.keempat + tab2.kelima + tab2.keenam + tab2.ketuju + tab2.kedelan + tab2.kesembilan + tab2.kesepuluh + tab2.kesebelas + tab2.keduabelas + tab2.ketigabelas 
					) AS total 
				FROM
					(
					SELECT
						tab1.dayname,
						tab1.tgl,
						tab1.line,
						tab1.orc,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '1' THEN tab1.qty END ), 0 ) AS pertama,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '2' THEN tab1.qty END ), 0 ) AS kedua,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '3' THEN tab1.qty END ), 0 ) AS ketiga,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '4' THEN tab1.qty END ), 0 ) AS keempat,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '5' THEN tab1.qty END ), 0 ) AS kelima,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '6' THEN tab1.qty END ), 0 ) AS keenam,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '7' THEN tab1.qty END ), 0 ) AS ketuju,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '8' THEN tab1.qty END ), 0 ) AS kedelan,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '9' THEN tab1.qty END ), 0 ) AS kesembilan,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '10' THEN tab1.qty END ), 0 ) AS kesepuluh,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '11' THEN tab1.qty END ), 0 ) AS kesebelas,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '12' THEN tab1.qty END ), 0 ) AS keduabelas,
						COALESCE ( sum( CASE WHEN tab1.timePeriode = '13' THEN tab1.qty END ), 0 ) AS ketigabelas
					FROM
						(
						SELECT
							DAYNAME( input_packing.tgl ) AS dayname,
							DATE( input_packing.tgl ) AS tgl,
							TIME( input_packing.tgl ) AS wkt,
							input_packing.line,
							input_packing.orc,
							newDurationLine (
								DAYNAME( input_packing.tgl ),
							TIME( input_packing.tgl )) AS timePeriode,
							SUM( input_packing.qty ) AS qty 
						FROM
							input_packing 
						WHERE
						DATE( input_packing.tgl ) = '$tgl' 
							
						GROUP BY
							newDurationLine (
								DAYNAME( input_packing.tgl ),
							TIME( input_packing.tgl )),
							input_packing.line,
							input_packing.orc 
						) AS tab1 
					GROUP BY
						tab1.line,
					tab1.tgl 
					) tab2
								";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function summary_daily_packing()
	{
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					DATE( input_packing.tgl ) AS tgl,
					input_packing.line,
					input_packing.orc,
					input_packing.style,
					input_packing.color,
					SUM( input_packing.qty ) AS qty 
				FROM
					input_sewing
					RIGHT JOIN input_packing ON input_packing.kode_barcode = input_sewing.kode_barcode 
				WHERE
					DATE( input_packing.tgl ) >= '$datefrom' 
					AND DATE( input_packing.tgl ) <= '$dateto' 
				GROUP BY
					DATE( input_packing.tgl ),
					input_packing.orc,
					input_packing.line
		";
		$query = $this->db->query($rst);

		return $query->result();
	}

	public function get_daily_packing()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					input_packing.no_bundle, 
					input_packing.qty, 
					DATE( input_packing.tgl ) AS tgl, 
					input_packing.orc, 
					input_packing.style, 
					input_packing.color, 
					input_packing.line,
						input_packing.size
				FROM
					input_sewing
					RIGHT JOIN input_packing ON input_packing.kode_barcode = input_sewing.kode_barcode 
				WHERE
				DATE( input_packing.tgl ) >= '$datefrom' 
				AND DATE( input_packing.tgl ) <= '$dateto'
		";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function get_all_orc_packing()
	{
		$rst = "SELECT
					`order`.`orc` 
				FROM
					`order`
				";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function get_daily_packing_orc()
	{

		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$orc = $dataStr['orc'];
		}

		$rst = "SELECT
					input_packing.orc, 
					input_packing.style, 
					input_packing.color, 
					input_packing.kode_barcode, 
					input_packing.qty, 
					input_packing.tgl, 
					input_packing.size, 
					input_packing.line, 
					input_packing.no_bundle
				FROM
					input_packing
					WHERE
					input_packing.orc = '$orc'
		
		";
		$query = $this->db->query($rst);

		return $query->result_array();
	}
	public function get_wip()
	{
		$rst = "SELECT
					`order`.`orc`,
					`order`.style,
					`order`.color,
					`order`.qty AS qty_order,
					output_sewing_detail.qty,
					input_packing.actual_qty,
					output_sewing_detail.qty - input_packing.actual_qty AS wip,
					`order`.qty - input_packing.actual_qty AS balance 
				FROM
					`order`
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS qty FROM output_sewing_detail GROUP BY output_sewing_detail.orc ) AS output_sewing_detail ON `order`.orc = output_sewing_detail.orc
					LEFT JOIN ( SELECT input_packing.orc, SUM( input_packing.qty) AS actual_qty FROM input_packing GROUP BY input_packing.orc ) AS input_packing ON `order`.orc = input_packing.orc 
				WHERE
					id_order >= 11851 
					AND output_sewing_detail.qty IS NOT NULL";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_all_fg()
	{

		$rst = "SELECT
					tb1.orc,
					tb1.color,
					tb1.style,
					ord.qty AS qt_ord,
					tb1.qty AS input_fg,
					fg_out.qty_out AS ouput_fg,
					ord.qty - COALESCE ( tb1.qty, 0 ) AS bal_in,
					ord.qty - COALESCE ( fg_out.qty_out, 0 ) AS bal_out,
					tb1.qty - COALESCE ( fg_out.qty_out, 0 ) AS stok 
				FROM
					(
					SELECT
						transfer_area.id_transfer_area,
						transfer_area.tgl_in,
						transfer_area.tgl_out,
						transfer_area.orc,
						transfer_area.style,
						transfer_area.color,
						Sum( transfer_area.qty_box ) AS qty 
					FROM
						transfer_area 
					WHERE
						transfer_area.tgl_in IS NOT NULL 
					GROUP BY
						transfer_area.orc 
					) AS tb1
					LEFT JOIN (
					SELECT
						transfer_area.id_transfer_area,
						transfer_area.tgl_in,
						transfer_area.tgl_out,
						transfer_area.orc,
						Sum( transfer_area.qty_box ) AS qty_out 
					FROM
						transfer_area 
					WHERE
						transfer_area.tgl_out IS NOT NULL 
					GROUP BY
						transfer_area.orc 
					) AS fg_out ON fg_out.orc = tb1.orc
					LEFT JOIN ( SELECT `order`.orc, `order`.qty FROM `order` ) AS ord ON ord.orc = tb1.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	// public function get_fg_in()
	// {

	// 	$datefrom = $_POST['datefrom'];
	// 	$dateto = $_POST['dateto'];

	// 	$rst = "SELECT
	// 				DATE( transfer_area.tgl_in ) AS tgl, 
	// 				transfer_area.orc, 
	// 				transfer_area.style, 
	// 				transfer_area.color, 
	// 				SUM(transfer_area.qty_box) AS qty, 
	// 				transfer_area.tgl_in
	// 			FROM
	// 				transfer_area
	// 			WHERE
	// 				DATE( transfer_area.tgl_in ) >= '$datefrom' AND
	// 				DATE( transfer_area.tgl_in ) <= '$dateto' AND
	// 					transfer_area.tgl_in IS NOT NULL
	// 			GROUP BY
	// 				DATE( transfer_area.tgl_in ), 
	// 				transfer_area.orc
	// 				ORDER BY
	// 				DATE( transfer_area.tgl_in ) ASC";
	// 	$query = $this->db->query($rst);
	// 	return $query->result();
	// }

	public function get_fg_in()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					DATE( transfer_area.tgl_in ) AS tgl,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					SUM(transfer_area.qty_box) AS qty,
					transfer_area.tgl_in 
				FROM
					transfer_area 
				WHERE
					DATE( transfer_area.tgl_in ) >= '$datefrom' 
					AND DATE( transfer_area.tgl_in ) <= '$dateto' 
					AND transfer_area.tgl_in IS NOT NULL 
				GROUP BY
					transfer_area.orc,
					DATE( transfer_area.tgl_in ),
					transfer_area.size 
				ORDER BY
					DATE( transfer_area.tgl_in ) ASC";
		$query = $this->db->query($rst);
		return $query->result();
	}
	public function detail_in($tgl, $orc)
	{
		$rst = "SELECT
					DATE( transfer_area.tgl_in ) AS tgl,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					sum(transfer_area.qty_box) as qty_box 
				FROM
					transfer_area 
				WHERE
					DATE( transfer_area.tgl_in ) = '$tgl' 
					AND transfer_area.orc = '$orc' 
					AND transfer_area.`status` = 'in'
				GROUP BY
					transfer_area.orc,
					DATE( transfer_area.tgl_in ),
					transfer_area.size";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_fg_out()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
				DATE( transfer_area.tgl_out ) AS tgl,
				transfer_area.orc,
				transfer_area.style,
				transfer_area.color,
				SUM( transfer_area.qty_box ) AS qty,
				transfer_area.tgl_out 
			FROM
				transfer_area 
			WHERE
				DATE( transfer_area.tgl_out ) >= '$datefrom ' 
				AND DATE( transfer_area.tgl_out ) <= '$dateto' 
				AND DATE( transfer_area.tgl_out )  IS NOT NULL
			GROUP BY
				transfer_area.orc,
				DATE( transfer_area.tgl_out )";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function detail_out($tgl, $orc)
	{
		$rst = "SELECT
					DATE( transfer_area.tgl_out ) AS tgl,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					sum( transfer_area.qty_box ) AS qty_box 
				FROM
					transfer_area 
				WHERE
					DATE( transfer_area.tgl_out  ) = '$tgl' 
					AND transfer_area.orc = '$orc' 
					AND DATE( transfer_area.tgl_out  ) is not null
				GROUP BY
					transfer_area.orc,
					DATE( transfer_area.tgl_out ),
					transfer_area.size	";
		$query = $this->db->query($rst);
		return $query->result();
	}

	function get_data_detail_in()
	{
		$orc = $_POST['orc'];
		$sql = "SELECT
					transfer_area.tgl_in,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					transfer_area.carton_no,
					transfer_area.qty_box,
					transfer_area.barcode 
				FROM
					transfer_area 
				WHERE
					transfer_area.orc = '$orc' 
					ORDER BY
					transfer_area.carton_no ASC
        ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_data_detail_out()
	{
		$orc = $_POST['orc'];
		$sql = "SELECT
					transfer_area.tgl_in,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					transfer_area.carton_no,
					transfer_area.qty_box,
					transfer_area.barcode 
				FROM
					transfer_area 
				WHERE
					transfer_area.orc = '$orc' 
					AND transfer_area.`status` = 'out'
				ORDER BY
					transfer_area.carton_no ASC
        ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_all_line()
	{
		$rst = "SELECT
					line.`name` 
				FROM
					line 
				WHERE
					line.description IS NOT NULL";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_by_daterange_downtime()
	{
		$db3 = $this->load->database('database3', true);

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$line = $_POST['line'];

		$rst = "SELECT
					date( `machine_breakdown`.`date_start_waiting` ) AS tgl_waiting,
					mekanik_member.NIK,
					mekanik_member.Nama,
					machine_breakdown.id_machine_breakdown,
					machine_breakdown.line,
					machine_breakdown.barcode_machine,
					machine_breakdown.machine_brand,
					machine_breakdown.machine_type,
					machine_breakdown.type,
					machine_breakdown.machine_sn,
					machine_breakdown.sympton,
					machine_breakdown.date_start_waiting AS date_start_waiting,
					machine_breakdown.date_end_waiting AS date_end_waiting,
					date( `mekanik_repairing`.`date_end_repairing` ) AS date_end_repairing,
					time( `machine_breakdown`.`date_start_waiting` ) AS start_waiting,
					time( `mekanik_repairing`.`date_start_repairing` ) AS start_repairing,
					time( `mekanik_repairing`.`date_end_repairing` ) AS end_repairing,
					timediff( `mekanik_repairing`.`date_start_repairing`, `machine_breakdown`.`date_start_waiting` ) AS respon_duration,
					timediff( `mekanik_repairing`.`date_end_repairing`, `mekanik_repairing`.`date_start_repairing` ) AS repair_duration,
					( to_days( date( `machine_breakdown`.`date_end_waiting` ) ) - to_days( date( `machine_breakdown`.`date_start_waiting` ) ) ) AS date_waiting,
					( to_days( date( `mekanik_repairing`.`date_end_repairing` ) ) - to_days( date( `mekanik_repairing`.`date_start_repairing` ) ) ) AS date_repairing 
				FROM
					machine_breakdown
					LEFT JOIN mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown
					LEFT JOIN mekanik_member ON mekanik_member.id_mekanik_member = mekanik_repairing.id_mekanik_member 
				WHERE
					machine_breakdown.line = '$line'
					AND
					date( `machine_breakdown`.`date_start_waiting` ) >= '$datefrom' 
					AND date( `machine_breakdown`.`date_start_waiting` ) <= '$dateto'";

		$query = $db3->query($rst);
		return $query->result();
	}
	public function get_by_daterange_daily($from_date, $to_date)
	{
		$db3 = $this->load->database('database3', true);
		// if (isset($_GET['dataStr'])) {
		// 	$dataStr = $_GET['dataStr'];

		// 	$from_date = date('Y-m-d', strtotime($dataStr['from_date']));
		// 	$to_date = date('Y-m-d', strtotime($dataStr['to_date']));
		// 	// $head =  $dataStr['head'];
		// }
		$rst = "SELECT
		date( `machine_breakdown`.`date_start_waiting` ) AS tgl_waiting,
		mekanik_member.NIK,
		mekanik_member.Nama,
		machine_breakdown.id_machine_breakdown,
		machine_breakdown.line,
		machine_breakdown.barcode_machine,
		machine_breakdown.machine_brand,
		machine_breakdown.machine_type,
		machine_breakdown.type,
		machine_breakdown.machine_sn,
		machine_breakdown.sympton,
		machine_breakdown.date_start_waiting AS date_start_waiting,
		machine_breakdown.date_end_waiting AS date_end_waiting,
		date( `mekanik_repairing`.`date_end_repairing` ) AS date_end_repairing,
		time( `machine_breakdown`.`date_start_waiting` ) AS start_waiting,
		time( `mekanik_repairing`.`date_start_repairing` ) AS start_repairing,
		time( `mekanik_repairing`.`date_end_repairing` ) AS end_repairing,
		timediff( `mekanik_repairing`.`date_start_repairing`, `machine_breakdown`.`date_start_waiting` ) AS respon_duration,
		timediff( `mekanik_repairing`.`date_end_repairing`, `mekanik_repairing`.`date_start_repairing` ) AS repair_duration,
		( to_days( date( `machine_breakdown`.`date_end_waiting` ) ) - to_days( date( `machine_breakdown`.`date_start_waiting` ) ) ) AS date_waiting,
		( to_days( date( `mekanik_repairing`.`date_end_repairing` ) ) - to_days( date( `mekanik_repairing`.`date_start_repairing` ) ) ) AS date_repairing,
		machine_settled.catatan 
	FROM
		machine_breakdown
		LEFT JOIN mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown
		LEFT JOIN mekanik_member ON mekanik_member.id_mekanik_member = mekanik_repairing.id_mekanik_member
		LEFT JOIN machine_settled ON machine_breakdown.id_machine_breakdown = machine_settled.id_machine_breakdown 
	WHERE
		date( `machine_breakdown`.`date_start_waiting` ) >= '$from_date' 
		AND date( `machine_breakdown`.`date_start_waiting` ) <= '$to_date'
		ORDER BY
		date( `machine_breakdown`.`date_start_waiting` ) ASC ";

		$query = $db3->query($rst);
		return $query->result();
	}

	public function get_by_month_v3()
	{
		$db3 = $this->load->database('database3', true);
		$queryMachine = "SELECT
			machine_type,
			`machine_breakdown`.`date_start_waiting`
		FROM
			machine_breakdown 
		WHERE
			`machine_breakdown`.`date_start_waiting` >= DATE_SUB( CURDATE(), INTERVAL 14 DAY ) 
			AND machine_breakdown.machine_type IS NOT NULL 
		GROUP BY
			machine_type";

		$machines = $db3->query($queryMachine)->result_array();

		$query = "WITH RECURSIVE DateRange AS ( SELECT CURDATE() `date` UNION ALL SELECT `date` - INTERVAL 1 DAY FROM DateRange WHERE `date` > CURDATE() - INTERVAL 13 DAY ) SELECT ";

		foreach ($machines as $machine) {
			$query .= "MAX( CASE WHEN mb.machine_type = '" . $machine["machine_type"] . "' THEN IFNULL(mb.tot, 0) ELSE 0 END ) AS `" . $machine["machine_type"] . "`,";
		}

		$query .= "td.`date` 
		FROM
			DateRange td
			LEFT JOIN (
			SELECT
				machine_type,
				tgl,
				COUNT( machine_type ) tot 
			FROM
				machine_breakdown 
			WHERE
				tgl >= DATE_SUB( CURDATE(), INTERVAL 14 DAY ) 
				AND machine_breakdown.machine_type IS NOT NULL 
			GROUP BY
				tgl,
				machine_type 
			) mb ON mb.tgl = td.`date` 
		WHERE
			mb.tgl IS NOT NULL
		GROUP BY
			td.`date`
		ORDER BY td.`date` ASC";

		$process = $db3->query($query);
		return $process->result_array();
	}

	public function get_by_month_detail_v2($label, $tgl)
	{
		$db3 = $this->load->database('database3', true);
		$resutReplace = str_replace("%20", " ", $label);
		$rst = "SELECT
			DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ) AS `month`,
		`machine_breakdown`.`date_start_waiting` tgl,
			machine_breakdown.machine_type,
			machine_breakdown.barcode_machine,
			machine_breakdown.machine_sn,
			COUNT( machine_breakdown.machine_type ) AS tot_machine 
		FROM
			machine_breakdown 
		WHERE
			DATE(`machine_breakdown`.`date_start_waiting`) = '$tgl'
			AND machine_breakdown.machine_type = '$resutReplace' 
		GROUP BY
			DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ),
			machine_breakdown.machine_type,
			machine_breakdown.barcode_machine 
		ORDER BY
			COUNT( machine_breakdown.machine_type ) DESC";
		$query = $db3->query($rst);
		return $query->result_array();
	}
	public function loadJml($kodeBarang)
	{
		$rst = "SELECT
			count( t1.kode_barang ) jml 
		FROM
			ams.barang t1 
		WHERE
			t1.kode_barang = '$kodeBarang' UNION ALL
		SELECT
			COUNT( t1.barcode_machine ) jml 
		FROM
			(
			SELECT
				COUNT( t1.machine_type ) tot,
				t1.barcode_machine,
				t1.tgl 
			FROM
				gomekanik.machine_breakdown t1 
			WHERE
				tgl >= DATE_SUB( CURDATE(), INTERVAL 13 DAY ) 
				AND t1.machine_type = '$kodeBarang' 
			GROUP BY
				t1.machine_type,
				t1.barcode_machine 
			ORDER BY
			t1.barcode_machine 
			) t1";
		$query = $this->db->query($rst);
		return $query->result_array();
	}

	public function get_month()
	{
		$db3 = $this->load->database('database3', true);

		$rst = "SELECT DISTINCT
					DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ) AS `month` 
				FROM
					machine_breakdown
					LEFT JOIN mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown
					LEFT JOIN mekanik_member ON mekanik_member.id_mekanik_member = mekanik_repairing.id_mekanik_member 
				GROUP BY
					DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ),
					machine_breakdown.line";
		$query = $db3->query($rst);
		return $query->result_array();
	}

	public function get_downtime_analize()
	{
		$db3 = $this->load->database('database3', true);
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$month = $dataStr['month'];
		}

		$rst = "SELECT
					DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ) AS `month`,
					Count( machine_breakdown.line ) AS tot_machine,
					machine_breakdown.sympton,
					machine_breakdown.machine_type,
					machine_breakdown.machine_sn,
					machine_breakdown.barcode_machine 
				FROM
					machine_breakdown
					LEFT JOIN mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown
					LEFT JOIN mekanik_member ON mekanik_member.id_mekanik_member = mekanik_repairing.id_mekanik_member 
				WHERE
					machine_breakdown.machine_type IS NOT NULL 
					AND DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ) = '$month' 
				GROUP BY
					DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ),
					machine_breakdown.barcode_machine,
					machine_breakdown.sympton,
					machine_breakdown.machine_type 
				ORDER BY
					DATE_FORMAT( `machine_breakdown`.`date_start_waiting`, '%M-%Y' ) ASC,
					machine_breakdown.barcode_machine DESC";
		$query = $db3->query($rst);
		return $query->result_array();
	}
	public function get_month_kpi()
	{
		$db3 = $this->load->database('database3', true);

		$rst = "SELECT DISTINCT
					DATE_FORMAT( machine_breakdown.date_start_waiting, '%M-%Y' ) AS `month` 
				FROM
					machine_breakdown 
				ORDER BY
					DATE_FORMAT( machine_breakdown.date_start_waiting, '%M-%Y' ) ASC";
		$query = $db3->query($rst);
		return $query->result_array();
	}

	public function get_datas_kpi($month)
	{
		$db3 = $this->load->database('database3', true);
		$rst = "SELECT
					DATE_FORMAT( machine_breakdown.date_start_waiting, '%M-%Y' ) AS bulan,
					YEAR ( machine_breakdown.date_start_waiting ) AS tahun,
					mekanik_member.NIK AS NIK,
					mekanik_member.Nama AS Nama,
					COUNT( mekanik_member.Nama ) AS total,
					SEC_TO_TIME( SUM( TIME_TO_SEC( timediff( mekanik_repairing.date_start_repairing, `machine_breakdown`.`date_start_waiting` ) ) ) ) AS respon_duration,
					SEC_TO_TIME( SUM( TIME_TO_SEC( timediff( mekanik_repairing.date_end_repairing, machine_breakdown.date_end_waiting ) ) ) ) AS repair_duration 
				FROM
					(
						(
							( mekanik_member JOIN user_mekanik ON ( user_mekanik.id_mekanik_member = mekanik_member.id_mekanik_member ) )
							JOIN machine_settled ON ( machine_settled.id_mekanik_member = mekanik_member.id_mekanik_member ) 
						)
						JOIN machine_breakdown ON ( machine_settled.id_machine_breakdown = machine_breakdown.id_machine_breakdown ) 
					)
					LEFT JOIN line ON line.`name` = machine_settled.line
					INNER JOIN mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown 
					AND mekanik_repairing.id_mekanik_member = mekanik_member.id_mekanik_member 
				WHERE
					YEAR ( machine_breakdown.date_start_waiting ) = YEAR ( CURRENT_DATE ) 
					AND DATE_FORMAT( machine_breakdown.date_start_waiting, '%M-%Y' ) = '$month' 
				GROUP BY
					mekanik_member.Nama,
					DATE_FORMAT( machine_breakdown.date_start_waiting, '%M-%Y' ) 
				ORDER BY
					COUNT( mekanik_member.Nama ) DESC
		";
		$query = $db3->query($rst);
		return $query->result_array();
	}

	// Bundle Record
	// ==================================================================================================
	public function get_all_orc()
	{
		$rst = "SELECT
					`orc`,
					`order`.tgl 
				FROM
					`order` 
				WHERE
					YEAR ( `order`.tgl ) IN ( YEAR ( CURDATE()), YEAR ( CURDATE()) - 1 )

				ORDER BY
					id_order DESC
				";
		$query = $this->db->query($rst);

		return $query->result_array();
	}

	public function get_detail($orc)
	{
		$rst = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting_detail.no_bundle,
					cutting_detail.size,
					cutting_detail.kode_barcode,
					sub_query_osd.kode_barcode AS barcode_sewing,
					sub_query_osd.qty,
					input_sewing.line,
					cutting.so,
					cutting.comm,
					cutting.date_created,
					cutting.buyer,
					cutting.qty AS qty_order 
				FROM
					cutting
					LEFT JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN ( 
					SELECT 
						output_sewing_detail.kode_barcode, 
						output_sewing_detail.qty 
						FROM 
						output_sewing_detail 
						WHERE 
						output_sewing_detail.orc = '$orc' 
						GROUP BY output_sewing_detail.kode_barcode ) AS sub_query_osd 
					ON cutting_detail.kode_barcode = sub_query_osd.kode_barcode
					LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
				WHERE
					cutting.orc = '$orc' 
				";
		$query = $this->db->query($rst);
		return $query->result_array();
	}

	public function getDataDetails($orc)
	{
		$datas = "SELECT
                cutting.orc,
                cutting.style,
                cutting.color,
                cutting.so,
                cutting.comm,
                cutting.date_created,
                cutting.buyer,
                cutting.qty AS qty_order 
              FROM
                cutting
                LEFT JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
              WHERE
                cutting.orc = '$orc' 
              GROUP BY
                cutting.orc 
              ";

		$query = $this->db->query($datas);
		return $query->result_array();
	}


	public function getDataSizeAndQty($orc)
	{
		$datas = "SELECT 
                cutting.orc, 
                cutting_detail.size, 
                SUM(cutting_detail.qty_pcs) as qty_pcs
              FROM 
                cutting 
                INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
              WHERE 
                cutting.orc = '$orc' 
              GROUP BY 
                cutting.orc, 
                cutting_detail.size
              ";

		$query = $this->db->query($datas);
		return $query->result_array();
	}

	public function getDataBundleRecord($orc, $size)
	{
		$datas = "SELECT 
                cutting.orc, 
                cutting_detail.size, 
                cutting_detail.kode_barcode, 
                input_sewing.kode_barcode AS barcode_input_sewing, 
                sub_query_osd.kode_barcode AS barcode_output_sewing, 
                cutting_detail.no_bundle, 
                cutting_detail.qty_pcs, 
                IFNULL(SUM(sub_query_osd.qty), 0) AS qty_out, 
                cutting_detail.qty_pcs - COALESCE (SUM(sub_query_osd.qty), 0) AS balance,
                sub_query_osd.date_scan
              FROM 
                cutting 
                INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
                LEFT JOIN (
                  SELECT 
                    output_sewing_detail.kode_barcode,
                    MAX(CONCAT( output_sewing_detail.tgl_ass, ' ', output_sewing_detail.assembly )) AS date_scan,
                    SUM(output_sewing_detail.qty) AS qty 
                  FROM 
                    output_sewing_detail 
                  WHERE 
                    output_sewing_detail.orc = '$orc' 
                  GROUP BY 
                    output_sewing_detail.kode_barcode
                ) AS sub_query_osd ON cutting_detail.kode_barcode = sub_query_osd.kode_barcode 
                LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
              WHERE 
                cutting.orc = '$orc' 
                AND cutting_detail.size = '$size' 
              GROUP BY 
                cutting.orc, 
                cutting_detail.kode_barcode
              ";

		$query = $this->db->query($datas);
		return $query->result_array();
	}

	// ==================================================================================================

	// Date Range Line Per Hours
	// ==================================================================================================
	public function getDataDateRangLinePerHours($date)
	{
		$rst = "SELECT
					table2.HR,
					table2.tgl_ass,
					table2.line,
					table2.description,
					table2.orc,
					table2.style,
					table2.color,
					table2.pertama,
					table2.kedua,
					table2.ketiga,
					table2.keempat,
					table2.kelima,
					table2.keenam,
					table2.ketuju,
					table2.kedelan,
					table2.kesembilan,
					table2.kesepuluh,
					(
						table2.pertama + table2.kedua + table2.ketiga + table2.keempat + table2.kelima + table2.keenam + table2.ketuju + table2.kedelan + table2.kesembilan + table2.kesepuluh 
					) AS total 
				FROM
					(
					SELECT
						table1.tgl_ass,
						table1.HR,
						table1.line,
						table1.description,
						table1.orc,
						table1.style,
						table1.color,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '1' THEN table1.resultQty END ), 0 ) AS pertama,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '2' THEN table1.resultQty END ), 0 ) AS kedua,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '3' THEN table1.resultQty END ), 0 ) AS ketiga,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '4' THEN table1.resultQty END ), 0 ) AS keempat,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '5' THEN table1.resultQty END ), 0 ) AS kelima,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '6' THEN table1.resultQty END ), 0 ) AS keenam,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '7' THEN table1.resultQty END ), 0 ) AS ketuju,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '8' THEN table1.resultQty END ), 0 ) AS kedelan,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '9' THEN table1.resultQty END ), 0 ) AS kesembilan,
						COALESCE ( sum( CASE WHEN table1.timePeriode = '10' THEN table1.resultQty END ), 0 ) AS kesepuluh 
					FROM
						(
						SELECT
							`order`.orc,
							`order`.style,
							`order`.color,
							sub_query.HR,
							sub_query.tgl_ass,
							sub_query.line,
							sub_query.description,
							sub_query.resultQty,
							sub_query.timePeriode 
						FROM
							`order`
							INNER JOIN (
							SELECT
								dayname( output_sewing_detail.tgl_ass ) AS HR,
								output_sewing_detail.tgl_ass,
								output_sewing.line,
								output_sewing_detail.orc,
								line.description,
								COALESCE ( SUM( output_sewing_detail.qty ), 0 ) AS resultQty,
								newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ) AS timePeriode 
							FROM
								output_sewing
								INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
								LEFT JOIN line ON line.NAME = output_sewing.line 
							WHERE
								output_sewing_detail.tgl_ass = '$date' 
							GROUP BY
								output_sewing_detail.tgl_ass,
								output_sewing.line,
								newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ),
								output_sewing_detail.orc 
							ORDER BY
								line.description ASC 
							) AS sub_query ON `order`.orc = sub_query.orc 
						) table1 
					GROUP BY
						table1.line,
						table1.tgl_ass,
						table1.orc,
						table1.style,
						table1.color 
					) AS table2 
				ORDER BY
					table2.description
					";

		$query = $this->db->query($rst);
		return $query->result();
	}
	// ==================================================================================================




	// Compare Barcode
	// ==================================================================================================
	// public function getDataORCCompareBarcode()
	// {
	// 	$rst = "SELECT
	// 				orc
	// 			FROM
	// 				input_cutting 
	// 			GROUP BY 
	// 				orc
	// 			ORDER BY
	// 				id_input_cutting DESC
	// 				";

	// 	$query = $this->db->query($rst);
	// 	return $query->result();
	// }

	public function getDataORCCompareBarcode()
	{
		$rst = "SELECT
					`order`.`orc` 
				FROM
					`order` 
				ORDER BY
					`order`.created DESC
									";

		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataCompareBarcodeTable($orc)
	{

		$rst = "SELECT
					cutting.orc,
					cutting_detail.kode_barcode as barcode_order,
					cut.kode_barcode AS barcode_cutting,
					in_sew.kode_barcode AS barcode_input_sewing,
					ot_sew.kode_barcode AS barcode_output_sewing,
					pac.kode_barcode AS barcode_packing 
				FROM
					cutting
					INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting
					LEFT JOIN ( SELECT input_cutting.orc, input_cutting.kode_barcode FROM input_cutting ) AS cut ON cut.kode_barcode = cutting_detail.kode_barcode
					LEFT JOIN ( SELECT input_sewing.orc, input_sewing.kode_barcode FROM input_sewing ) AS in_sew ON in_sew.kode_barcode = cutting_detail.kode_barcode
					LEFT JOIN ( SELECT output_sewing_detail.orc, output_sewing_detail.kode_barcode FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.kode_barcode ) AS ot_sew ON ot_sew.kode_barcode = cutting_detail.kode_barcode
					LEFT JOIN ( SELECT input_packing.orc, input_packing.kode_barcode FROM input_packing ) AS pac ON pac.kode_barcode = cutting_detail.kode_barcode 
				WHERE
					cutting.orc = '$orc'
								";

		$query = $this->db->query($rst);
		return $query->result();
	}
	// ==================================================================================================

	public function get_data_mekanik_today()
	{
		$db3 = $this->load->database('database3', true);
		$rst = "SELECT
					m.id_mekanik_member,
					m.tgl,
					m.NIK,
					m.Inisial,
					m.Shift,
					SEC_TO_TIME( SUM( m.duration ) ) totalDurationTime,
					COUNT( m.duration ) AS totalBid,
					ROUND( ( ( ( SUM( m.duration ) ) / 28800 ) * 100 ), 2 ) AS `perform`,
					ROUND( ( ( COUNT( m.duration ) / o.repairT ) * 100 ), 2 ) AS `keaktifan` 
				FROM
					(
					SELECT
						mr.tgl,
						mm.id_mekanik_member,
						mm.NIK,
						mm.Inisial,
						mm.Shift,
						mr.start_repairing,
						mr.end_repairing,
						mr.date_start_repairing,
						mr.date_end_repairing,
						(
							TIME_TO_SEC( TIMEDIFF( mr.end_repairing, IF ( mr.end_repairing = '00:00:00', mr.end_repairing, mr.start_repairing ) ) ) 
						) AS duration 
					FROM
						mekanik_member mm,
						mekanik_repairing mr 
					WHERE
						mr.id_mekanik_member = mm.id_mekanik_member 
						AND ( date( mr.date_start_repairing ) = CURRENT_DATE ( ) AND date( mr.date_end_repairing ) = CURRENT_DATE ( ) ) 
					) m,
					( SELECT mr.tgl, COUNT( mr.id_machine_breakdown ) AS repairT FROM mekanik_repairing mr WHERE mr.tgl = CURRENT_DATE ( ) ) o 
				WHERE
					m.tgl = o.tgl 
				GROUP BY
					m.NIK
				ORDER BY
				Inisial ASC";
		$query = $db3->query($rst);
		return $query->result();
	}

	public function get_daterange()
	{
		$db3 = $this->load->database('database3', true);

		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$date_from = date('Y-m-d', strtotime($dataStr['from_date']));
			$date_to = date('Y-m-d', strtotime($dataStr['to_date']));

			$rst = "SELECT
						m.id_mekanik_member,
						m.NIK,
						m.Inisial,
						COUNT( m.duration ) AS bind,
						SEC_TO_TIME( SUM( m.duration ) ) AS totDuration 
					FROM
						(
						SELECT
							mm.id_mekanik_member,
							mm.NIK,
							mm.Inisial,
							date( mr.date_start_repairing ) AS dateOrder,
							TIME_TO_SEC( TIMEDIFF( mr.end_repairing, IF ( mr.end_repairing = '00:00:00', mr.end_repairing, mr.start_repairing ) ) ) AS duration 
						FROM
							mekanik_member mm,
							mekanik_repairing mr,
							machine_breakdown mb 
						WHERE
							mr.id_mekanik_member = mm.id_mekanik_member 
							AND mb.id_machine_breakdown = mr.id_machine_breakdown 
							AND ( ( date( mr.date_start_repairing ) BETWEEN '$date_from' AND '$date_to' ) AND ( date( mr.date_end_repairing ) BETWEEN '$date_from' AND '$date_to' ) ) 
						) m 
					GROUP BY
						m.NIK";
			$query = $db3->query($rst);
			return $query->result();
		}
	}

	public function get_data_per_mechanic($idMech)
	{
		$db3 = $this->load->database('database3', true);

		$rst = "SELECT
					mr.start_repairing AS timeOrder,
					mb.line,
					mb.machine_brand,
					mb.machine_type,
					mb.type,
					mb.sympton,
					( TIMEDIFF( mr.end_repairing, IF ( mr.end_repairing = '00:00:00', mr.end_repairing, mr.start_repairing ) ) ) AS duration 
				FROM
					mekanik_member mm,
					mekanik_repairing mr,
					machine_breakdown mb 
				WHERE
					mr.id_mekanik_member = mm.id_mekanik_member 
					AND mb.id_machine_breakdown = mr.id_machine_breakdown 
					AND ( date( mr.date_start_repairing ) = CURRENT_DATE ( ) AND date( mr.date_end_repairing ) = CURRENT_DATE ( ) ) 
					AND mm.id_mekanik_member = '$idMech'";
		$query = $db3->query($rst);
		return $query->result();
	}

	public function get_detail_date_range($idMech)
	{
		$db3 = $this->load->database('database3', true);

		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			$date_from = date('Y-m-d', strtotime($dataStr['from_date']));
			$date_to = date('Y-m-d', strtotime($dataStr['to_date']));

			$rst = "SELECT
						mb.machine_brand,
						mb.machine_type,
						mb.type,
						mb.sympton,
						mb.line,
						date( mr.date_start_repairing ) AS dateOrder,
						mr.start_repairing AS timeBind,
						( TIMEDIFF( mr.end_repairing, IF ( mr.end_repairing = '00:00:00', mr.end_repairing, mr.start_repairing ) ) ) AS duration 
					FROM
						mekanik_member mm,
						mekanik_repairing mr,
						machine_breakdown mb 
					WHERE
						mr.id_mekanik_member = mm.id_mekanik_member 
						AND mb.id_machine_breakdown = mr.id_machine_breakdown 
						AND (
							( date( mr.date_start_repairing ) BETWEEN '$date_from' AND '$date_to' ) 
							AND ( date( mr.date_end_repairing ) BETWEEN '$date_from' AND '$date_to' ) 
						) 
						AND mm.id_mekanik_member = '$idMech'";
			$query = $db3->query($rst);
			return $query->result();
		}
	}

	public function get_graph_packing()
	{
		$rst = "SELECT
					DATE( input_packing.tgl ) AS tgl, 
					input_packing.orc, 
					SUM(input_packing.qty) AS qty, 
					input_packing.style, 
					input_packing.color
				FROM
					input_packing
				WHERE
					DATE( input_packing.tgl ) = CURRENT_DATE
				GROUP BY
					DATE( input_packing.tgl ), 
					input_packing.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_total_today_packing()
	{
		$rst = "SELECT
					DATE( input_packing.tgl ) AS tgl,
					SUM( input_packing.qty ) AS qty 
				FROM
					input_packing 
				WHERE
					DATE( input_packing.tgl ) = CURRENT_DATE 
				GROUP BY
					DATE(
					input_packing.tgl)";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_orc_packing($orc)
	{
		$rst = "SELECT
					DATE( input_packing.tgl ) AS tgl,
					input_packing.orc,
					input_packing.style,
					input_packing.color,
					input_packing.size,
					input_packing.no_bundle,
					input_packing.qty 
				FROM
					input_packing 
				WHERE
					DATE( input_packing.tgl ) = CURRENT_DATE 
					AND input_packing.orc = '$orc'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_graph_finishgood()
	{
		$rst = "SELECT
					DATE( transfer_area.tgl_in ) AS tgl, 
					transfer_area.orc, 
					SUM(transfer_area.qty_box) AS qty, 
					transfer_area.style, 
					transfer_area.color
				FROM
					transfer_area
				WHERE
					DATE( transfer_area.tgl_in ) = CURRENT_DATE
				GROUP BY
					DATE( transfer_area.tgl_in ), 
					transfer_area.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_total_today_finish()
	{
		$rst = "SELECT
					DATE( transfer_area.tgl_in ) AS tgl,
					SUM(transfer_area.qty_box ) as qty
				FROM
					transfer_area 
				WHERE
					DATE( transfer_area.tgl_in ) = CURRENT_DATE
					GROUP BY
					DATE( transfer_area.tgl_in ) ";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_detail_orc_finish($orc)
	{
		$rst = "SELECT
					transfer_area.qty_box AS qty,
					transfer_area.style,
					transfer_area.color,
					transfer_area.orc,
					transfer_area.size 
				FROM
					transfer_area 
				WHERE
					DATE( transfer_area.tgl_in ) = CURRENT_DATE 
					AND transfer_area.orc = '$orc'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function getDataSummaryProd($orc)
	{
		$data = "SELECT
					`order`.`orc`,
					`order`.style_sam,
					`order`.comm,
					`order`.buyer,
					`order`.so,
					`order`.color,
					`order`.etd,
					`order`.plan_export,
					`order`.qty AS qty_order,
					cut.trimstore_in,
					cutoday.in_today,
					cut.trimstore_in - ins.sewing_in AS wip_cut,
					`order`.qty - ins.sewing_in AS balance_trim,
					cut_t.cutting_in_today,
					osd.qty AS sewing_out,
					ins.sewing_in,
					sewin.sew_in_today,
					ins.sewing_in - osd.qty AS wip_sew,
					`order`.qty - osd.qty AS balance_sew,
					sew_t.sew_today,
					pack.pack_out,
					pack_in.packing_in,
					pack_in.packing_in - pack.pack_out AS wip,
					pack_today.pack_today,
					`order`.qty - pack.pack_out AS balance_pack,
					fg.input_fg,
					fg.ouput_fg,
					fg.input_fg - fg.ouput_fg AS wip_fg,
					`order`.qty - fg.ouput_fg AS balance_fg 
				FROM
					`order`
					LEFT JOIN ( SELECT input_cutting.orc, SUM( input_cutting.qty_pcs ) AS trimstore_in FROM input_cutting WHERE input_cutting.orc = '$orc' GROUP BY input_cutting.orc ) AS cut ON cut.orc = `order`.orc
					LEFT JOIN ( SELECT input_sewing.orc, SUM( input_sewing.qty_pcs ) AS sewing_in FROM input_sewing WHERE input_sewing.orc = '$orc' GROUP BY input_sewing.orc ) AS ins ON ins.orc = `order`.orc
					LEFT JOIN (
					SELECT
						input_cutting.tgl,
						input_cutting.orc,
						SUM( input_cutting.qty_pcs ) AS in_today 
					FROM
						input_cutting 
					WHERE
						input_cutting.tgl = CURRENT_DATE 
						AND input_cutting.orc = '$orc' 
					GROUP BY
						input_cutting.tgl,
						input_cutting.orc 
					) AS cutoday ON cutoday.orc = `order`.orc
					LEFT JOIN (
					SELECT
						input_sewing.tgl,
						input_sewing.orc,
						SUM( input_sewing.qty_pcs ) AS sew_in_today 
					FROM
						input_sewing 
					WHERE
						input_sewing.tgl = CURRENT_DATE 
						AND input_sewing.orc = '$orc' 
					GROUP BY
						input_sewing.tgl,
						input_sewing.orc 
					) AS sewin ON sewin.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS qty FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.orc ) AS osd ON osd.orc = `order`.orc
					LEFT JOIN (
					SELECT
						output_sewing_detail.orc,
						SUM( output_sewing_detail.qty ) AS sew_today,
						output_sewing_detail.tgl_ass 
					FROM
						output_sewing_detail 
					WHERE
						output_sewing_detail.orc = '$orc' 
						AND output_sewing_detail.tgl_ass = CURRENT_DATE 
					GROUP BY
						output_sewing_detail.orc 
					) AS sew_t ON sew_t.orc = `order`.orc
					LEFT JOIN (
					SELECT
						op.orc AS orc,
						sum( opd.qty ) AS pack_today,
						DATE( op.tgl ) AS tgl 
					FROM
						output_packing AS op
						JOIN output_packing_detail AS opd ON opd.id_output_packing = op.id_output_packing 
					WHERE
						op.orc = '$orc' 
						AND DATE( op.tgl ) = CURRENT_DATE 
					GROUP BY
						op.orc 
					) AS pack_today ON pack_today.orc = `order`.orc
					LEFT JOIN (
					SELECT
						op.orc AS orc,
						sum( opd.qty ) AS pack_out 
					FROM
						output_packing AS op
						JOIN output_packing_detail AS opd ON opd.id_output_packing = op.id_output_packing
						LEFT JOIN `order` ON op.orc = `order`.orc 
					WHERE
						op.orc = '$orc' 
					GROUP BY
						op.orc 
					) AS pack ON pack.orc = `order`.orc
					LEFT JOIN (
					SELECT
						tab1.orc,
						tab1.qty,
						( CASE WHEN tab1.tgl_in IS NOT NULL THEN tab1.qty END ) AS input_fg,
						( CASE WHEN tab1.`status` = 'out' THEN tab1.qty END ) AS ouput_fg 
					FROM
						(
						SELECT
							transfer_area.id_transfer_area,
							transfer_area.orc,
							Sum( transfer_area.qty_box ) AS qty,
							transfer_area.`status`,
							transfer_area.tgl_in 
						FROM
							transfer_area 
						WHERE
							transfer_area.orc = '$orc' 
						GROUP BY
							transfer_area.orc,
							transfer_area.`status` 
						) AS tab1 
					GROUP BY
						tab1.orc,
						tab1.`status` 
					) AS fg ON fg.orc = `order`.orc
					LEFT JOIN (
					SELECT
						input_cutting.orc,
						SUM( input_cutting.qty_pcs ) AS cutting_in_today,
						input_cutting.tgl 
					FROM
						input_cutting 
					WHERE
						input_cutting.tgl = CURRENT_DATE 
					GROUP BY
						input_cutting.orc,
						input_cutting.tgl 
					) AS cut_t ON cut_t.orc = `order`.orc
					LEFT JOIN ( SELECT input_packing.orc, SUM( input_packing.qty ) AS packing_in FROM input_packing GROUP BY input_packing.orc ) AS pack_in ON pack_in.orc = `order`.orc 
				WHERE
					`order`.`orc` = '$orc'  
					AND cut.trimstore_in IS NOT NULL
          ";

		$query = $this->db->query($data);
		return $query->result();
	}

	public function getDataSummaryProdGlobal()
	{
		$data = "SELECT * FROM rt_production_report";

		$query = $this->db->query($data);
		return $query->result();
	}

	public function getDataOrcSummary()
	{
		$data = "SELECT
					`order`.`orc`
				FROM
					`order`
				";

		$query = $this->db->query($data);
		return $query->result();
	}

	public function get_skp_in()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting.buyer,
					SUM( input_skp.qty ) AS qty,
					DATE( input_skp.date_created ) AS tgl 
				FROM
					cutting_detail
					INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN input_skp ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail 
				WHERE
					DATE( input_skp.date_created ) >= '$datefrom' 
					AND DATE( input_skp.date_created ) <= '$dateto' 
";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function detail_in_skp($tgl, $orc)
	{
		$rst = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting.buyer,
					input_skp.qty,
					cutting_detail.size,
					DATE( input_skp.date_created ) AS tgl 
				FROM
					cutting_detail
					INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN input_skp ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail 
				WHERE
					DATE( input_skp.date_created ) = '$tgl' 
					AND cutting.orc = '$orc'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function summary_skp()
	{
		$rst = "SELECT
					ctd.orc,
					ctd.buyer,
					ctd.color,
					ctd.style,
					ctd.qty,
					iskp.qty_skp_in,
					oskp.qty_skp_out 
				FROM
					(
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting.qty 
					FROM
						cutting
						INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
					WHERE
						cutting_detail.skp_barcode IS NOT NULL 
					GROUP BY
						cutting.orc 
					) AS ctd
					LEFT JOIN (
					SELECT
						cutting.orc,
						SUM( input_skp.qty ) AS qty_skp_in 
					FROM
						cutting_detail
						INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
						LEFT JOIN input_skp ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail 
					WHERE
						cutting_detail.skp_barcode IS NOT NULL 
					GROUP BY
						cutting.orc 
					) AS iskp ON iskp.orc = ctd.orc
					LEFT JOIN (
					SELECT
						SUM( output_skp.qty ) AS qty_skp_out,
						ctd.orc 
					FROM
						input_skp
						INNER JOIN output_skp ON input_skp.id_input_skp = output_skp.id_input_skp
						LEFT JOIN (
						SELECT
							cutting.orc,
							cutting.style,
							cutting.color,
							cutting.buyer,
							cutting_detail.id_cutting_detail 
						FROM
							cutting
							INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
						) AS ctd ON input_skp.id_cutting_detail = ctd.id_cutting_detail 
					GROUP BY
					ctd.orc 
					) AS oskp ON oskp.orc = ctd.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_skp_out()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					input_skp.id_cutting_detail,
					line.`name`,
					DATE( input_skp.date_created ) as tgl,
					SUM(output_skp.qty) as qty,
					ctd.orc,
					ctd.style,
					ctd.color,
					ctd.buyer 
				FROM
					input_skp
					INNER JOIN output_skp ON input_skp.id_input_skp = output_skp.id_input_skp
					INNER JOIN line ON output_skp.id_line = line.id_line
					LEFT JOIN (
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting_detail.id_cutting_detail 
					FROM
					cutting
					INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting) as ctd ON input_skp.id_cutting_detail = ctd.id_cutting_detail
					WHERE
					DATE( output_skp.date_created ) >= '$datefrom' 
					AND DATE( input_skp.date_created ) <= '$dateto'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function detail_out_skp($tgl, $orc)
	{
		$rst = "SELECT
					input_skp.id_cutting_detail,
					line.`name`,
					DATE( input_skp.date_created ) AS tgl,
					output_skp.qty AS qty,
					ctd.orc,
					ctd.style,
					ctd.color,
					ctd.buyer ,
					ctd.size
				FROM
					input_skp
					INNER JOIN output_skp ON input_skp.id_input_skp = output_skp.id_input_skp
					INNER JOIN line ON output_skp.id_line = line.id_line
					LEFT JOIN (
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting_detail.size,
						cutting_detail.id_cutting_detail 
					FROM
						cutting
						INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
					) AS ctd ON input_skp.id_cutting_detail = ctd.id_cutting_detail 
				WHERE
					DATE( output_skp.date_created ) = '$tgl' 
					AND ctd.orc = '$orc'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_juita_in()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting.buyer,
					SUM( input_juwita.qty ) AS qty,
					DATE( input_juwita.date_created ) AS tgl 
				FROM
					cutting_detail
					INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN input_juwita ON cutting_detail.id_cutting_detail = input_juwita.id_cutting_detail 
				WHERE
					DATE( input_juwita.date_created ) >= '$datefrom' 
					AND DATE( input_juwita.date_created ) <= '$dateto'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function detail_in_juita($tgl, $orc)
	{
		$rst = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting.buyer,
					input_juwita.qty,
					DATE( input_juwita.date_created ) AS tgl 
				FROM
					cutting_detail
					INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN input_juwita ON cutting_detail.id_cutting_detail = input_juwita.id_cutting_detail 
				WHERE
					cutting.orc = '$orc' 
					AND DATE( input_juwita.date_created ) = '$tgl'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function get_juita_out()
	{

		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];

		$rst = "SELECT
					input_juwita.id_cutting_detail,
					line.`name`,
					DATE( input_juwita.date_created ) as tgl,
					SUM(output_juwita.qty) as qty,
					ctd.orc,
					ctd.style,
					ctd.color,
					ctd.buyer 
				FROM
					input_juwita
					INNER JOIN output_juwita ON input_juwita.id_input_juwita = output_juwita.id_input_juwita
					INNER JOIN line ON output_juwita.id_line = line.id_line
					LEFT JOIN (
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting_detail.id_cutting_detail 
					FROM
					cutting
					INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting) as ctd ON input_juwita.id_cutting_detail = ctd.id_cutting_detail
					WHERE
					DATE( output_juwita.date_created ) >= '$datefrom' 
					AND DATE( input_juwita.date_created ) <= '$dateto'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function detail_juita_juwita($tgl, $orc)
	{
		$rst = "SELECT
					input_juwita.id_cutting_detail,
					line.`name`,
					DATE( input_juwita.date_created ) AS tgl,
					output_juwita.qty AS qty,
					ctd.orc,
					ctd.style,
					ctd.color,
					ctd.buyer ,
					ctd.size
				FROM
					input_juwita
					INNER JOIN output_juwita ON input_juwita.id_input_juwita = output_juwita.id_input_juwita
					INNER JOIN line ON output_juwita.id_line = line.id_line
					LEFT JOIN (
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting_detail.size,
						cutting_detail.id_cutting_detail 
					FROM
						cutting
						INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
					) AS ctd ON input_juwita.id_cutting_detail = ctd.id_cutting_detail 
				WHERE
					DATE( output_juwita.date_created ) = '$tgl' 
					AND ctd.orc = '$orc'";
		$query = $this->db->query($rst);
		return $query->result();
	}

	public function summary_juita()
	{
		$rst = "SELECT
					ctd.orc,
					ctd.buyer,
					ctd.color,
					ctd.style,
					ctd.qty,
					ijuwita.qty_juwita_in,
					ojuwita.qty_juwita_out 
				FROM
					(
					SELECT
						cutting.orc,
						cutting.style,
						cutting.color,
						cutting.buyer,
						cutting.qty 
					FROM
						cutting
						INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
					WHERE
						cutting_detail.juwita_barcode IS NOT NULL 
					GROUP BY
						cutting.orc 
					) AS ctd
					LEFT JOIN (
					SELECT
						cutting.orc,
						SUM( input_juwita.qty ) AS qty_juwita_in 
					FROM
						cutting_detail
						INNER JOIN cutting ON cutting_detail.id_cutting = cutting.id_cutting
						LEFT JOIN input_juwita ON cutting_detail.id_cutting_detail = input_juwita.id_cutting_detail 
					WHERE
						cutting_detail.juwita_barcode IS NOT NULL 
					GROUP BY
						cutting.orc 
					) AS ijuwita ON ijuwita.orc = ctd.orc
					LEFT JOIN (
					SELECT
						SUM( output_juwita.qty ) AS qty_juwita_out,
						ctd.orc 
					FROM
						input_juwita
						INNER JOIN output_juwita ON input_juwita.id_input_juwita = output_juwita.id_input_juwita
						LEFT JOIN (
						SELECT
							cutting.orc,
							cutting.style,
							cutting.color,
							cutting.buyer,
							cutting_detail.id_cutting_detail 
						FROM
							cutting
							INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
						) AS ctd ON input_juwita.id_cutting_detail = ctd.id_cutting_detail 
					GROUP BY
					ctd.orc 
					) AS ojuwita ON ojuwita.orc = ctd.orc";
		$query = $this->db->query($rst);
		return $query->result();
	}
}
