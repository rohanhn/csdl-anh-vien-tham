<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<head>
				<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1"/>
				<title>dimap</title>
				<style type="text/css">
      .entete { color: #fff; font-style: italic; font-weight: bolder; font-size: 14px; font-family: Georgia, "Times New Roman" }
      .titre  { font-weight: bolder; font-size: 20px; font-family: Georgia, "Times New Roman"; text-align: center }
      .spotview { color: white; font-weight: bolder; font-size: 32px; font-family: Verdana, "Times New Roman"; text-align: center }
      .intitule { font-weight: bolder; font-size: 11px; font-family: Verdana, Arial }
      .intitule2 { color: silver; font-weight: bolder; font-size: 11px; font-family: Verdana, Arial }
      .description { font-size: 11px; font-family: Verdana, Arial }
      .affiche { display : show}
      .masque { display  : none; }

      .onglets   {  font-weight: bolder; font-size: 11px; font-family: Verdana, Helvetica; text-decoration: none; text-align: center }
      .ongletsOn {  font-weight: bolder; font-size: 11px; font-family: Verdana, Helvetica; text-decoration: none; text-align: center }

      a.onglets    { color: #00607a; text-decoration: none; }
      a.onglets:active  { color: #00607a }
      a.onglets:hover  { color: white; text-decoration: none }

      a.ongletsOn    { color: #000000; text-decoration: none }
      a.ongletsOn:active  { color: #000000 }
      a.ongletsOn:hover  { color: #000000; text-decoration: none }

      div.onglets {background-color : #bbbbbb; }
      div.onglets {background-color : #bbbbbb; }
      div.ongletsOn {background-color : #e4decb; }

      td.onglets {background-color : #bbbbbb; border-style : solid; border-width : 1pt; border-color : black;}
      td.ongletsOn {background-color : #e4decb;  border-style : solid; border-width : 1pt; border-color : black;}

      #tblOnglets { border-style : thin-solid; border-color : black;}

      </style>
			</head>
			<body bgcolor="#00607a" onload="organize('description')" onresize="onWindowResize()">
				<div align="center">
					<table border="0" cellpadding="0" cellspacing="0" id="tblOnglets" width="80%">
						<tr height="5"/>
					</table>
				</div>
				<div align="center">
					<table border="0" bordercolor="black" cellpadding="0" cellspacing="0" width="80%">
						<tr>
							<td>
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tr>
													<td width="120">
														<div align="center">
															<a target="_blank" title="quicklook">
																<xsl:attribute name="href"><xsl:value-of select="//DATASET_QL_PATH/@href"/></xsl:attribute>
																<img border="0" id="imgQc">
																	<xsl:attribute name="src"><xsl:value-of select="//DATASET_TN_PATH/@href"/></xsl:attribute>
																</img>
															</a>
														</div>
													</td>
													<td width="80%">
														<table border="0" cellpadding="2" cellspacing="5" class="intitule2">
															<xsl:if test="//GEOMETRIC_PROCESSING">
																<tr>
																	<td width="8"/>
																	<td width="70">Type</td>
																	<td width="20"/>
																	<td>
																		<xsl:value-of select="//Production/PRODUCT_INFO"/>
																	</td>
																</tr>
															</xsl:if>
															<xsl:if test="//DATASET_NAME">
																<tr>
																	<td width="8"/>
																	<td width="70">Layer</td>
																	<td width="20"/>
																	<td>
																		<xsl:value-of select="//Dataset_Id/DATASET_NAME"/>
																	</td>
																</tr>
															</xsl:if>
															<xsl:if test="//METADATA_FORMAT">
																<tr>
																	<td width="8"/>
																	<td width="70">Format</td>
																	<td width="20"/>
																	<td>
																		<xsl:value-of select="//Metadata_Id/METADATA_FORMAT"/>
																	</td>
																</tr>
															</xsl:if>
															<xsl:if test="//DATA_FILE_FORMAT">
																<tr>
																	<td width="8"/>
																	<td width="70">Raster</td>
																	<td width="20"/>
																	<td>
																		<xsl:value-of select="//Data_Access/DATA_FILE_FORMAT"/>
																	</td>
																</tr>
															</xsl:if>
														</table>
													</td>
													<td>
														<div align="right">
															<p>
																<img src="../LOGO.JPG" border="0" align="middle"/>
															</p>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<br/>
					<div id="divGenInfo" class="affiche">
						<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
							<tr>
								<td valign="middle" align="center">
									<br/>
									<table border="0" cellpadding="0" cellspacing="0" width="95%">
										<tr>
											<td valign="top">
												<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
													<tr>
														<td>
															<span class="entete">General Information</span>
														</td>
													</tr>
												</table>
												<br/>
												<table border="0" cellpadding="0" cellspacing="5" width="100%">
													<tr>
														<td class="intitule" width="50%">Map Name</td>
														<td class="description">
															<xsl:value-of select="//Dataset_Id/DATASET_NAME"/>
															<br/>
														</td>
													</tr>
													<xsl:if test="//GEOMETRIC_PROCESSING">
														<tr>
															<td class="intitule" width="50%">Geometric Processing Level</td>
															<td class="description">
																<xsl:value-of select="//GEOMETRIC_PROCESSING"/>
																<br/>
															</td>
														</tr>
													</xsl:if>
													<xsl:if test="//RADIOMETRIC_PROCESSING">
														<tr>
															<td class="intitule" width="50%">Radiometric Processing Level</td>
															<td class="description">
																<xsl:value-of select="//RADIOMETRIC_PROCESSING"/>
																<br/>
															</td>
														</tr>
													</xsl:if>
												</table>
											</td>
										</tr>
									</table>
									<br/>
								</td>
							</tr>
						</table>
					</div>
					<!-- /GenInfo -->
					<a name="description"/>
					<div id="divImgDim" class="affiche">
						<br/>
						<xsl:if test="//Raster_Dimensions">
							<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
								<tr>
									<td valign="middle" align="center">
										<br/>
										<table border="0" cellpadding="0" cellspacing="0" width="95%">
											<tr>
												<td valign="top">
													<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
														<tr>
															<td>
																<span class="entete">Image dimensions</span>
															</td>
														</tr>
													</table>
													<br/>
													<table border="0" cellpadding="0" cellspacing="5" width="100%">
														<xsl:if test="//NCOLS">
															<tr>
																<td class="intitule" width="50%">Number of pixels per line</td>
																<td class="description">
																	<xsl:value-of select="//NCOLS"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//NROWS">
															<tr>
																<td class="intitule" width="50%">Number of lines</td>
																<td class="description">
																	<xsl:value-of select="//NROWS"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//NBANDS">
															<tr>
																<td class="intitule" width="50%">Number of spectral bands</td>
																<td class="description">
																	<xsl:value-of select="//NBANDS"/>
																</td>
															</tr>
														</xsl:if>
													</table>
												</td>
											</tr>
										</table>
										<br/>
									</td>
								</tr>
							</table>
						</xsl:if>
					</div>
					<!-- /divImgDim -->
					<a name="sourceinfo"/>
					<div id="divDtstFrm" class="affiche">
						<xsl:if test="//Dataset_Frame">
							<br/>
							<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
								<tr>
									<td valign="middle" align="center">
										<br/>
										<table border="0" cellpadding="0" cellspacing="0" width="95%">
											<tr>
												<td valign="top">
													<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
														<tr>
															<td>
																<span class="entete">Dataset framing</span>
															</td>
														</tr>
													</table>
													<br/>
													<table border="0" cellpadding="0" cellspacing="2" width="100%">
														<tr>
															<td class="intitule" width="25%">Corner</td>
															<td class="intitule" width="25%">Longitude (DEG)</td>
															<td class="intitule" width="25%">Latitude (DEG)</td>
															<td class="intitule" width="10%">Line</td>
															<td class="intitule" width="10%">Pixel</td>
															<br/>
														</tr>
														<xsl:for-each select="//Dataset_Frame/Vertex">
															<tr class="description">
																<td width="25%">#<xsl:value-of select="position()"/>
																</td>
																<td width="25%">
																	<xsl:value-of select="FRAME_LON"/>
																</td>
																<td width="25%">
																	<xsl:value-of select="FRAME_LAT"/>
																</td>
																<td width="10%">
																	<xsl:value-of select="FRAME_ROW"/>
																</td>
																<td width="10%">
																	<xsl:value-of select="FRAME_COL"/>
																</td>
															</tr>
														</xsl:for-each>
													</table>
													<br/>
													<table border="0" cellpadding="0" cellspacing="2" width="100%">
														<tr>
															<td class="intitule" width="25%">Center</td>
															<td class="intitule" width="25%">Longitude (DEG)</td>
															<td class="intitule" width="25%">Latitude (DEG)</td>
															<td class="intitule" width="10%">Line</td>
															<td class="intitule" width="10%">Pixel</td>
															<br/>
														</tr>
														<xsl:for-each select="//Dataset_Frame/Scene_Center">
															<tr class="description">
																<td width="25%">#<xsl:value-of select="position()"/>
																</td>
																<td width="25%">
																	<xsl:value-of select="FRAME_LON"/>
																</td>
																<td width="25%">
																	<xsl:value-of select="FRAME_LAT"/>
																</td>
																<td width="10%">
																	<xsl:value-of select="FRAME_ROW"/>
																</td>
																<td width="10%">
																	<xsl:value-of select="FRAME_COL"/>
																</td>
															</tr>
														</xsl:for-each>
													</table>
												</td>
											</tr>
										</table>
										<br/>
									</td>
								</tr>
							</table>
						</xsl:if>
					</div>
					<!-- /divDtstFrm -->
					<div id="divSources" class="affiche">
						<br/>
						<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
							<tr>
								<td valign="middle" align="center">
									<br/>
									<table border="0" cellpadding="0" cellspacing="0" width="95%">
										<tr>
											<td valign="top">
												<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
													<tr>
														<td>
															<span class="entete">Dataset sources</span>
														</td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="5" width="100%">
													<xsl:for-each select="//Source_Information">
														<xsl:choose>
															<xsl:when test="SOURCE_TYPE='DEM'">
																<tr>
																	<td valign="top" width="50">
																		<p class="intitule">
																			<a title="show / hide details">DEM</a>
																		</p>
																	</td>
																	<td class="description">
																		<xsl:value-of select="SOURCE_ID"/>
																	</td>
																</tr>
															</xsl:when>
															<xsl:otherwise>
																<tr>
																	<td valign="top" width="50">
																		<p class="intitule">
																			<a title="show / hide details">
																				<xsl:value-of select="Scene_Source/MISSION"/>
																			</a>
																		</p>
																	</td>
																	<td class="description">
																		<xsl:value-of select="SOURCE_ID"/>
																	</td>
																</tr>
																<tr>
																	<td valign="top"/>
																	<td>
																		<div class="affiche">
																			<xsl:attribute name="id">div<xsl:value-of select="generate-id()"/></xsl:attribute>
																			<table border="0" cellspacing="5" width="100%">
																				<tr valign="top">
																					<td width="800">
																						<table border="0">
																							<xsl:if test="SOURCE_ID">
																								<tr>
																									<td class="intitule" width="50%">Id</td>
																									<td class="description">
																										<xsl:value-of select="SOURCE_ID"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/GRID_REFERENCE">
																								<tr>
																									<td class="intitule" width="50%">K - J</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/GRID_REFERENCE"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/SHIFT_VALUE">
																								<tr>
																									<td class="intitule" width="50%">Line shift</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/SHIFT_VALUE"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/IMAGING_DATE">
																								<tr>
																									<td class="intitule" width="50%">Date</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/IMAGING_DATE"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/IMAGING_TIME">
																								<tr>
																									<td class="intitule" width="50%">Time</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/IMAGING_TIME"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/INSTRUMENT">
																								<tr>
																									<td class="intitule" width="50%">Instrument</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/INSTRUMENT"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/IMAGING_MODE">
																								<tr>
																									<td class="intitule" width="50%">Sensor</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/IMAGING_MODE"/>
																									</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/SATELLITE_INCIDENCE_ANGLE">
																								<tr>
																									<td class="intitule" width="50%">Satellite incidence angle</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/SATELLITE_INCIDENCE_ANGLE"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/SATELLITE_AZIMUTH_ANGLE">
																								<tr>
																									<td class="intitule" width="50%">Satellite azimuth angle</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/SATELLITE_AZIMUTH_ANGLE"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/VIEWING_ANGLE_ALONG_TRACK">
																								<tr>
																									<td class="intitule" width="50%">Viewing angle along track</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/VIEWING_ANGLE_ALONG_TRACK"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/VIEWING_ANGLE_ACROSS_TRACK">
																								<tr>
																									<td class="intitule" width="50%">Viewing angle across track</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/VIEWING_ANGLE_ACROSS_TRACK"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/SUN_AZIMUTH">
																								<tr>
																									<td class="intitule" width="50%">Sun azimuth</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/SUN_AZIMUTH"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																							<xsl:if test="Scene_Source/SUN_ELEVATION">
																								<tr>
																									<td class="intitule" width="50%">Sun elevation</td>
																									<td class="description">
																										<xsl:value-of select="Scene_Source/SUN_ELEVATION"/> (DEG)</td>
																								</tr>
																							</xsl:if>
																						</table>
																					</td>
																				</tr>
																			</table>
																		</div>
																	</td>
																</tr>
															</xsl:otherwise>
														</xsl:choose>
													</xsl:for-each>
												</table>
											</td>
										</tr>
									</table>
									<br/>
								</td>
							</tr>
						</table>
					</div>
					<!-- /divSources -->
					<div id="divStrip" class="affiche">
						<br/>
						<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
							<tr>
								<td valign="middle" align="center">
									<br/>
									<table border="0" cellpadding="0" cellspacing="0" width="95%">
										<tr>
											<td valign="top">
												<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
													<tr>
														<td>
															<span class="entete">Dataset Strip / Calibration</span>
														</td>
													</tr>
												</table>
												<br/>
												<table border="0" cellpadding="0" cellspacing="5" width="100%">
													<xsl:for-each select="//Data_Strip_Identification">
														<!-- tr>
                                 <td valign="top" width="50">
                                    <p class="intitule"><a title="show / hide details"><xsl:attribute name="href">javascript:details("div1<xslt:eval>childNumber(this)</xslt:eval>")</xsl:attribute><xsl:value-of select="DATA_STRIP_ID"/></a></p>
                                 </td>
                              </tr -->
														<tr>
															<td>
																<!--div class="masque"><xsl:attribute name="ID">div1<xslt:eval>childNumber(this)</xslt:eval></xsl:attribute -->
																<table border="0" cellpadding="0" cellspacing="2" width="100%">
																	<tr>
																		<td class="intitule" width="50%">Data strip Id</td>
																		<td class="description">
																			<xsl:value-of select="DATA_STRIP_ID"/>
																		</td>
																	</tr>
																	<tr>
																		<td class="intitule" width="50%">Segment Id</td>
																		<td class="description">
																			<xsl:value-of select="SEGMENT_ID"/>
																		</td>
																	</tr>
																	<xsl:for-each select="//Scene_Source">
																		<tr>
																			<td class="intitule" width="50%">Revolution number</td>
																			<td class="description">
																				<xsl:value-of select="REVOLUTION_NUMBER"/>
																			</td>
																		</tr>
																	</xsl:for-each>
																	<xsl:for-each select="//Calibration">
																		<tr>
																			<td class="intitule" width="50%">Calibration type</td>
																			<td class="description">
																				<xsl:value-of select="CALIBRATION_TYPE"/>
																			</td>
																		</tr>
																		<tr>
																			<td class="intitule" width="50%">Calibration filename</td>
																			<td class="description">
																				<xsl:value-of select="CALIBRATION_FILENAME"/>
																			</td>
																		</tr>
																	</xsl:for-each>
																	<tr>
																		<td class="intitule" width="50%">BAND DESCRIPTION</td>
																		<td class="description">
																			<table bordercolor="#A9AB87" border="1" cellpadding="0" cellspacing="1" width="80%">
																				<xsl:for-each select="../Sensor_Calibration/Calibration/Band_Parameters">
																					<tr>
																						<td class="description">Band <xsl:value-of select="BAND_INDEX"/>
																							<br/>
																							<xsl:for-each select="Gain_Section_List/Gain_Section">
																								<xsl:if test="GAIN_NUMBER">Gain number : <xsl:value-of select="GAIN_NUMBER"/>
																									<br/>
																								</xsl:if>
																								<xsl:if test="PHYSICAL_GAIN">Physical Gain : <xsl:value-of select="PHYSICAL_GAIN"/>
																									<BR/>
																								</xsl:if>
																								<xsl:if test="PHYSICAL_BIAS">Physical Bias : <xsl:value-of select="PHYSICAL_BIAS"/>
																									<BR/>
																								</xsl:if>
																							</xsl:for-each>
																						</td>
																					</tr>
																				</xsl:for-each>
																			</table>
																		</td>
																	</tr>
																</table>
																<!-- /div -->
															</td>
														</tr>
													</xsl:for-each>
												</table>
											</td>
										</tr>
									</table>
									<br/>
								</td>
							</tr>
						</table>
					</div>
					<!-- /divStrip -->
					<div id="divCRS" class="affiche">
						<br/>
						<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
							<tr>
								<td valign="middle" align="center">
									<br/>
									<table border="0" cellpadding="0" cellspacing="0" width="95%">
										<tr>
											<td valign="top">
												<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
													<tr>
														<td>
															<span class="entete">Coordinate Reference System</span>
														</td>
													</tr>
												</table>
												<br/>
												<table border="0" cellpadding="0" cellspacing="5" width="100%">
													<tr>
														<td class="intitule" width="50%">
															<font color="#A9AB87">Horizontal Coordinate System</font>
														</td>
													</tr>
													<xsl:if test="//GEO_TABLES">
														<tr>
															<td class="intitule" width="50%">Geocoding tables identification</td>
															<td class="description">
																<xsl:value-of select="//GEO_TABLES"/>(<xsl:value-of select="//GEO_TABLES/@version"/>)</td>
														</tr>
													</xsl:if>
													<xsl:if test="//HORIZONTAL_CS_TYPE">
														<tr>
															<td class="intitule" width="50%">Horizontal Coordinate System type</td>
															<td class="description">
																<xsl:value-of select="//HORIZONTAL_CS_TYPE"/>
															</td>
														</tr>
													</xsl:if>
													<xsl:if test="//HORIZONTAL_CS_NAME">
														<tr>
															<td class="intitule" width="50%">Horizontal coordinate system identification name</td>
															<td class="description">
																<xsl:value-of select="//HORIZONTAL_CS_NAME"/>
															</td>
														</tr>
													</xsl:if>
													<tr>
														<td class="intitule" width="50%">
															<font color="#A9AB87">Geographic Coordinate System</font>
														</td>
														<td class="description"/>
													</tr>
													<xsl:if test="//GEOGRAPHIC_CS_NAME">
														<tr>
															<td class="intitule" width="50%">Geographic Coordinate System</td>
															<td class="description">
																<xsl:value-of select="//GEOGRAPHIC_CS_NAME"/>
															</td>
														</tr>
													</xsl:if>
												</table>
											</td>
										</tr>
									</table>
									<br/>
								</td>
							</tr>
						</table>
					</div>
					<!-- /divCRS -->
					<div id="divProd" class="affiche">
						<br/>
						<xsl:if test="//Production">
							<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
								<tr>
									<td valign="middle" align="center">
										<br/>
										<table border="0" cellpadding="0" cellspacing="0" width="95%">
											<tr>
												<td valign="top">
													<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
														<tr>
															<td>
																<span class="entete">Production</span>
															</td>
														</tr>
													</table>
													<br/>
													<table border="0" cellpadding="0" cellspacing="5" width="100%">
														<xsl:if test="//DATASET_PRODUCTION_DATE">
															<tr>
																<td valign="top" class="intitule" width="50%">Production Date</td>
																<td class="description">
																	<xsl:value-of select="//DATASET_PRODUCTION_DATE"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//JOB_ID">
															<tr>
																<td valign="top" class="intitule">Job identification</td>
																<td class="description">
																	<xsl:value-of select="//JOB_ID"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//PRODUCT_TYPE">
															<tr>
																<td valign="top" class="intitule">Product type identification</td>
																<td class="description">
																	<xsl:value-of select="//PRODUCT_TYPE"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//DATASET_PRODUCER_NAME">
															<tr>
																<td valign="top" class="intitule">Dataset Producer Identification</td>
																<td class="description">
																	<xsl:value-of select="//DATASET_PRODUCER_NAME"/>
																</td>
															</tr>
														</xsl:if>
														<xsl:if test="//DATASET_PRODUCER_URL">
															<tr>
																<td valign="top" class="intitule">Producer link</td>
																<td class="description">
																	<a target="_blank">
																		<xsl:attribute name="href"><xsl:value-of select="//DATASET_PRODUCER_URL/@href"/></xsl:attribute>
																		<xsl:value-of select="//DATASET_PRODUCER_URL/@href"/>
																	</a>
																</td>
															</tr>
														</xsl:if>
													</table>
												</td>
											</tr>
										</table>
										<br/>
									</td>
								</tr>
							</table>
						</xsl:if>
					</div>
					<a name="quicklook"/>
					<div id="divQuicklook" class="affiche">
						<br/>
						<xsl:if test="//DATASET_QL_PATH/@href">
							<table border="3" bordercolor="#A9AB87" cellpadding="0" cellspacing="0" width="80%" bgcolor="#eeeeee">
								<tr>
									<td valign="middle" align="center">
										<br/>
										<table border="0" cellpadding="0" cellspacing="0" width="95%">
											<tr>
												<td valign="top">
													<div align="center">
														<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#A9AB87">
															<tr>
																<td>
																	<span class="entete">Quicklook</span>
																</td>
															</tr>
														</table>
														<br/>
														<img id="imgQl" width="500" height="500" border="0">
															<xsl:attribute name="src"><xsl:value-of select="//DATASET_QL_PATH/@href"/></xsl:attribute>
														</img>
													</div>
												</td>
											</tr>
										</table>
										<br/>
									</td>
								</tr>
							</table>
						</xsl:if>
					</div>
				</div>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>
