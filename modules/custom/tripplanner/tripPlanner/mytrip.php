<div id ="mytrip" class="roundCorners">
<!--My Trip start 1-->


    <!-- My Trip end 1-->
<img src="/loading.gif" id="tpimageForWait" style="visibility:hidden; position:absolute;left:83px;" />


                   <!--My Trip start 2-->

                        <img src="/loading.gif" id="tpimageForWait" style="visibility: hidden;
                            position: absolute; left: 83px;" />
                        <table cellpadding="0" cellspacing="0" style="width: 100%; display:none;   margin-bottom: 0;" >
                            <tr>
                                 <td id="divCP" onclick="ShowTpForm('CP')" style="background-color: #00BB11; color: White;
                                    border: solid 1px gray; cursor: pointer;">
                                    Custom Planner
                              </td> 
                                
                                <td id="divSCH" onclick="ShowTpForm('SCH')" style="cursor: pointer; border: solid 1px gray;">
                                    Schedules1
                                </td>
                            </tr>
                        </table>
                        

                        <form name="tpForm" id="tpForm">
    <label id="divP2PHeadline" style="font-weight:bold; margin-top: 15px; display:none">Subway &amp; Bus Schedules</label>
    <div class="form-group">
      <label for="txtOriginInput" id="labelForStartAddress">From</label>
      <div class="input-group">
          <input id="txtOriginInput" maxlength="2048" name="fromAddress" onclick="SmartTripClick('ADDRESSTEXTBOX',this, 'fromAutoFillList');" onkeyup="ShowFromOptions(this, 'fromAutoFillList' );" type="text" value=""  class="form-control"  />
          <div id="fromAutoFillList" class="list" style="visibility: hidden;"> </div>
      </div>
    </div>
    <div class="form-group" id="divEndAddress">
        <label for="txtDestinationInput"> To</label>
        <div class="input-group">
            <input id="txtDestinationInput" maxlength="2048" name="toAddress" onclick="SmartTripClick('ADDRESSTEXTBOX',this, 'toAutoFillList' );" onkeyup="ShowFromOptions(this, 'toAutoFillList' );" type="text" value="" class="form-control" />
            <div id="toAutoFillList" class="list" style="visibility: hidden;"> </div>
        </div>
        
    </div>
    <div class="form-group" id="divLeaveArr">
        <div class="radio-inline leave">
            <label for="DepId"> Leave at</label>
            <input id="DepId" checked="checked" name="Arrdep" type="radio" value="D" />
        </div>
        <div class="radio-inline leave">
            <label for="ArrId"> Arrive by</label>
            <input id="ArrId" name="Arrdep" type="radio" value="A" />
        </div>
        <div class="radio-inline">
            <label for="divTime" id="lbltime" style="display: none;"> Time</label>
            <div id="divTime">
                <select id="ddlHour" name="hour" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <select id="ddlMinute" name="minute" class="form-control">
                  <option>00</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                  <option>05</option>
                  <option>06</option>
                  <option>07</option>
                  <option>08</option>
                  <option>09</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>
                  <option>13</option>
                  <option>14</option>
                  <option>15</option>
                  <option>16</option>
                  <option>17</option>
                  <option>18</option>
                  <option>19</option>
                  <option>20</option>
                  <option>21</option>
                  <option>22</option>
                  <option>23</option>
                  <option>24</option>
                  <option>25</option>
                  <option>26</option>
                  <option>27</option>
                  <option>28</option>
                  <option>29</option>
                  <option>30</option>
                  <option>31</option>
                  <option>32</option>
                  <option>33</option>
                  <option>34</option>
                  <option>35</option>
                  <option>36</option>
                  <option>37</option>
                  <option>38</option>
                  <option>39</option>
                  <option>40</option>
                  <option>41</option>
                  <option>42</option>
                  <option>43</option>
                  <option>44</option>
                  <option>45</option>
                  <option>46</option>
                  <option>47</option>
                  <option>48</option>
                  <option>49</option>
                  <option>50</option>
                  <option>51</option>
                  <option>52</option>
                  <option>53</option>
                  <option>54</option>
                  <option>55</option>
                  <option>56</option>
                  <option>57</option>
                  <option>58</option>
                  <option>59</option>
                </select>
                <select id="ddlampm" name="ampm" class="form-control">
                  <option value="am">a.m.</option>
                  <option value="pm">p.m.</option>
                </select>
              </div>
        </div>
    </div>
    <div class="form-group">
        <label for="fdate"> Date</label>
        <div class="input-group">
            <input id="RequestDate" maxlength="10" name="date" size="8" class="form-control" type="text"/>
              <img alt="calendar" onclick="document.forms['tpForm'].elements['date'].focus()" src="/themes/custom/mta/images/calendar-icon.jpg" style="margin-left: 6px; display: none;" />
        </div>
    </div>
    
    <div class="form-group" id="divTransitMode">
        <label>Using</label> 
        <div class="checkbox-inline">
            <input id="xmodeB" checked="checked" name="xmodeB" type="checkbox" value="B" />
            <label for="xmodeB"> Bus</label>
        </div>
        <div class="checkbox-inline">
            <input id="xmodeX" name="xmodeX" type="checkbox" value="X" />
            <label for="xmodeX"> Express Bus</label>
        </div>
        <div class="checkbox-inline">
            <input id="xmodeCT" checked="checked" name="xmodeCT" type="checkbox" value="C" />
            <label for="xmodeCT"> Rail</label>
        </div>
        <div class="checkbox-inline">
            <input id="xmodeR" checked="checked" name="xmodeR" type="checkbox" value="R" />
            <label for="xmodeR"> Subway</label>
        </div>
    </div>
     
      <div id="divWalkDist" style="display: none; margin-top: 15px; ">
        <label> Walking distance</label>
        <select name="Walkdist" id="ddlWalkdistance">
          <option value="0.25">1/4 mile</option>
          <option value="0.50" selected="selected">1/2 mile</option>
          <option value="0.75">3/4 mile</option>
          <option value="1.00" >1 mile</option>
        </select>
      </div>
      <div class="form-group accessible-trip">
        <label for="accessibleChkbox"> Accessible Trip?</label>
        <input id="accessibleChkbox" name="Atr" title="Do you want your trip to be wheelchair accessible?"
									  type="checkbox" value="Y" />
      </div>
      <div class="form-group">
        <input id="submitButton"  onclick="SmartTripClick('SUBMIT','' , '')" type="button" value="submit" class="btn btn-primary btn-block" />
        <span id="waitMsg" style="display: none; white-space: nowrap; color: red; font-size: 11px; font-weight: bold;">Please Wait...</span> </div>
    
    
    
    <div id="tpAlert" style="display: none; padding: 10px; border: solid black 2px; text-align: center; position: absolute; top: 200px; left: 200px; width: 170px; background-color: silver; font-size: 12px; font-weight: bold;"> </div>
    <div id="map1" style="width: 200px; height: 200px; display: none;"> </div>
    <div id="map2" style="width: 200px; height: 200px; display: none;"> </div>
    <input type="hidden" id="currentmodule" name="currentmodule" value="tripplanner" />
  </form>



                        <form name="tpSubmit" action="http://Tripplanner.mta.info/mytrip/handler/customplannerHandler.ashx?cid=mtahome"
                        method="get" target="_top" style="display: none">
                        <input type="hidden" name="jsonpacket" value="" />
                        </form>
                        <!--My Trip end-->
 </div>
