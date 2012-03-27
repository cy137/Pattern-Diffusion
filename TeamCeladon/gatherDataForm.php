<form id="gatherDataForm" class="form-horizontal">
	<fieldset>
		<!--<div id="signUpError" class="alert alert-block alert-error fade in hide">
			<a class="close" data-dismiss="alert">x</a>
				<strong>Warning!</strong><span id="signUpErrorTxt"></span>
		</div>-->
		<div class="control-group">
			<label class="control-label" for="geocode">Geocode</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="geocode"/>
					<p class="help-block">The location to search by.</p>
				</div>
		</div>
		<div class="control-group" style="display:none">
			<label class="control-label" for="lang">Language</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="lang"/>
					<p class="help-block">The language to filter results by.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="pages">Pages</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="pages" value="10"/>
					<p class="help-block">The number of pages to return.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="resultType">Result type</label>
				<div class="controls">
					<select class="input-xlarge" id="resultType">
						<option value="mixed" selected="true">Mixed</option>
						<option value="recent">Recent</option>
						<option value="popular">Popular</option>
					</select>
					<p class="help-block">Filters to only show the selected type.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="rpp">Results per page</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="rpp" value="100"/>
					<p class="help-block">The number of results that will show on each page.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="showUser">Show user</label>
				<div class="controls">
					<select class="input-xlarge" id="showUser">
						<option value="true">True</option>
						<option value="false" selected="true">False</option>
					</select>
					<p class="help-block">Prepends the user name to the tweet.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="until">Until</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="until">
					<p class="help-block">Return tweets up to the specified date.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sinceID">Since ID</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="sinceID">
					<p class="help-block">Return tweets after the specified tweet.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="includeEntities">Include tweet metadata</label>
				<div class="controls">
					<select class="input-xlarge" id="includeEntities">
						<option value="true" selected="true">True</option>
						<option value="false">False</option>
					</select>
					<p class="help-block">Determines whether to include the tweet metadata.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="words">Words</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="words">
					<p class="help-block">The words to search for, comma delimited.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="wordModifiers">Word modifiers</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="wordModifiers">
					<p class="help-block">Modifiers to the above words, comma delimited.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="hashTags">Hash Tags</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="hashTags">
					<p class="help-block">Search for specific hash tags.</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fromUser">From User</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="fromUser">
					<p class="help-block">Filter tweets sent by a specific user</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="toUser">To User</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="toUser">
					<p class="help-block">Filter tweets sent to a specific user</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="place">Place</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="place">
					<p class="help-block">Filter tweets according to a specific place</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="mentions">Mentions</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="mentions">
					<p class="help-block">Filter tweets according to mentions of a specific user</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sinceDate">Since Date</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="sinceDate">
					<p class="help-block">Return tweets after a specified date</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="attitude">Attitude</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="attitude">
					<p class="help-block">Filters tweets according to atittude</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="question">Question</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="question">
					<p class="help-block">Filters tweets according to if they are a question</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="hasURL">Has URL</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="hasURL">
					<p class="help-block">Filters tweets according to if they have a URL</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="source">Source</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="source">
					<p class="help-block">Filters tweets according to source</p>
				</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="customFilter">Custom Filter</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="customFilter">
					<p class="help-block">Filters tweets according to a custom filter</p>
				</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary" id="submitButton" onclick="SubmitQuery();return false;">Submit</button>
			</div>
		</div>
	</fieldset>
</form>