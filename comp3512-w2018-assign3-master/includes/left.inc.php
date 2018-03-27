            <aside class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Continents</div>
                    <ul class="list-group">
                    <?php $DBGateway->displayContinentPanelList(); ?>
                    </ul>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">Popular</div>
                    <ul class="list-group">
                        <?php $DBGateway->displayCountriesPanelList(); ?>
                    </ul>
                </div>
            </aside>