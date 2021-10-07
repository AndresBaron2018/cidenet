<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show  c-sidebar-minimized" id="sidebar">
	<div class="c-sidebar-brand d-lg-down-none">
		<a href="/" class="c-sidebar-brand-full">
			<img src="/images/logoblanco.svg" width="180" height="46" alt="Accedo Logo" />
		</a>
		<a href="/" class="c-sidebar-brand-minimized">
			<img src="/images/logoblanco-mini.svg" width="46" height="46" alt="Accedo Logo" />
		</a>
	</div>
	<ul class="c-sidebar-nav">
		@role('admin|facilities.manager|facilities.officer|administrative|finance')
			<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
				<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
					<i class="c-sidebar-nav-icon fas fa-search"></i> Search
				</a>
				<ul class="c-sidebar-nav-dropdown-items">
					<li class="c-sidebar-nav-item">
						<div class="c-sidebar-nav-link px-3 pb-3">
							<form action="{{ route('search') }}" autocomplete="off" method="POST">
								@csrf
								<div class="input-group">
									<input type="text" name="name" class="form-control" placeholder="Numero orden/solicitud - descripcion" required>
								</div>
							</form>
						</div>
					</li>
				</ul>
			</li>
		@endrole
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="/">
				<i class="c-sidebar-nav-icon fas fa-home"></i> Dashboard
			</a>
		</li>
		<li class="c-sidebar-nav-title">Facilities</li>
		@role('admin|facilities.manager|facilities.officer|administrative')
		<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
			<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
				<i class="c-sidebar-nav-icon fas fa-user-friends"></i> Proveedores
			</a>
			<ul class="c-sidebar-nav-dropdown-items">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('vendor.selection.criteria.index') }}">Criterios de
						Seleccion</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('vendor.index') }}">Lista de Proveedores</a>
				</li>
			</ul>
		</li>
		@endrole
		@role('admin|facilities.manager|facilities.officer|user.compras|corporate.comptroller|finance|administrative|administrative.up')
		<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
			<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
				<i class="c-sidebar-nav-icon fas fa-box-open"></i> Compras
			</a>
			<ul class="c-sidebar-nav-dropdown-items">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link"
						href="{{ route('solicitud.compra.index', 'pendiente-revision') }}">Solicitud de compra</a>
				</li>
				@role('admin|corporate.comptroller')
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link"
						href="{{ route('solicitud.compra.revision', 'pendiente-revision') }}">Revision de solicitud</a>
				</li>
				@endrole
				@role('admin|facilities.manager|facilities.officer|finance|administrative|administrative.up')
				<li class="c-sidebar-nav-item">
					@role('administrative|administrative.up')
					<a class="c-sidebar-nav-link" href="{{ route('orden.compra.index', 'pendiente-aprobar') }}">Orden de
						compra</a>
					@endrole
					@role('admin|facilities.manager|facilities.officer|finance')
					<a class="c-sidebar-nav-link" href="{{ route('orden.compra.index', 'pendiente-crear') }}">Orden de
						compra</a>
					@endrole
				</li>
				@endrole
			</ul>
		</li>
		@endrole
		@role('admin|facilities.manager|facilities.officer|finance|administrative')
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('facilities.report.index') }}">
				<i class="c-sidebar-nav-icon fas fa-chart-bar"></i> Reports
			</a>
		</li>
		@endrole
		@role('admin|facilities.manager|facilities.officer|finance|administrative')
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="/Contratos">
				<i class="c-sidebar-nav-icon fas fa-file-signature"></i> Contratos
			</a>
		</li>
		@endrole
		@role('admin|wfm.officer|wfm.lead|facilities.manager|facilities.officer|administrative')
		<li class="c-sidebar-nav-title">Workforce Management</li>
		<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
			<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
				<i class="c-sidebar-nav-icon fas fa-route"></i>Routes
			</a>
			<ul class="c-sidebar-nav-dropdown-items">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{   route('wfm.routes.transport', array('Pereira')) }}">
						Pereira
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{   route('wfm.routes.transport', array('Bogota'))  }}">
						Bogota
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('wfm.routes.transport', array('Bucaramanga')) }}">
						Bucaramanga
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('wfm.routes.transport', array('Cali')) }}">
						Cali
					</a>
				</li>
			</ul>
		</li>
		<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
			<a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
				<i class="c-sidebar-nav-icon fas fa-bus-alt"></i> Transport
			</a>
			<ul class="c-sidebar-nav-dropdown-items">
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{   route('wfm.transport', array('Pereira')) }}">
						Pereira
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{   route('wfm.transport',  array('Bogota'))  }}">
						Bogota
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('wfm.transport', array('Bucaramanga')) }}">
						Bucaramanga
					</a>
				</li>
				<li class="c-sidebar-nav-item">
					<a class="c-sidebar-nav-link" href="{{ route('wfm.transport', array('Cali')) }}">
						Cali
					</a>
				</li>
			</ul>
		</li>
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('wfm.reports') }}">
				<i class="c-sidebar-nav-icon fas fa-chart-bar"></i> Reports
			</a>
		</li>
		@endrole
	</ul>
	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
		data-class="c-sidebar-minimized"></button>
</div>
